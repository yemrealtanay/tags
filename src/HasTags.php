<?php

namespace Yemrealtanay\Tags;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasTags
{
    protected array $queuedTags = [];

    public static function getTagClassName(): string
    {
        return config('tags.tag_model', Tag::class);
    }

    public static function bootHasTags(): void
    {
        static::created(function (Model $taggableModel) {
            if (count($taggableModel->queuedTags) === 0) {
                return;
            }

            $taggableModel->attachTags($taggableModel->queuedTags);

            $taggableModel->queuedTags = [];
        });

        static::deleted(function (Model $deletedModel) {
            $tags = $deletedModel->tags()->get();

            $deletedModel->detachTags($tags);
        });
    }

    public function tags(): MorphToMany
    {
        return $this
            ->morphToMany(self::getTagClassName(), 'taggable')
            ->ordered();
    }

    public function scopeWithAllTags(
        Builder $query,
        string | array | ArrayAccess | Tag $tags,
    ): Builder {
        $tags = static::convertToTags($tags);

        collect($tags)->each(function ($tag) use ($query) {
            $query->whereHas('tags', function (Builder $query) use ($tag) {
                $query->where('tags.tag_id', $tag->tag_id ?? 0);
            });
        });

        return $query;
    }

    public function scopeWithAnyTags(
        Builder $query,
        string | array | ArrayAccess | Tag $tags,
    ): Builder {
        $tags = static::convertToTags($tags);

        return $query
            ->whereHas('tags', function (Builder $query) use ($tags) {
                $tagIds = collect($tags)->pluck('tag_id');

                $query->whereIn('tags.tag_id', $tagIds);
            });
    }

    public function attachTags(array | ArrayAccess | Tag $tags): static
    {
        $className = static::getTagClassName();

        $tags = collect($className::findOrCreate($tags));

        $this->tags()->syncWithoutDetaching($tags->pluck('tag_id')->toArray());

        return $this;
    }

    public function attachTag(string | Tag $tag): Tag
    {
        return $this->attachTags([$tag]);
    }

    public function detachTags(array | ArrayAccess $tags): static
    {
        $tags = static::convertToTags($tags);

        collect($tags)
            ->filter()
            ->each(fn (Tag $tag) => $this->tags()->detach($tag));

        return $this;
    }

    public function detachTag(string | Tag $tag): static
    {
        return $this->detachTags([$tag]);
    }

    protected static function convertToTags($values)
    {
        if ($values instanceof Tag) {
            $values = [$values];
        }

        return collect($values)->map(function ($value) {
            if ($value instanceof Tag) {
                return $value;
            }

            $className = static::getTagClassName();

            return $className::findFromString($value);
        });
    }

}
