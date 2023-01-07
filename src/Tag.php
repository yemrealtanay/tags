<?php

namespace Yemrealtanay\Tags;

use ArrayAccess;
use HasTags;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Tag extends Model
{
    public string $name;

    use HasFactory, SoftDeletes, HasTags;

    public $guarded = [];


    public static function findOrCreate(
        string | array | ArrayAccess $values,
    ): Collection | Tag | static {
        $tags = collect($values)->map(function ($value) {
            if ($value instanceof self) {
                return $value;
            }

            return static::findOrCreateFromString($value);
        });

        return is_string($values) ? $tags->first() : $tags;
    }

    public static function findFromString(string $name): Model|Builder|null
    {
        return static::query()
            ->where("name", $name)
            ->first();
    }

    private static function findOrCreateFromString($value): bool
    {
        foreach ($value as $name){
            $tag = static::findFromString($name);

            if (! $tag) {
                $tag = static::create([
                    'name' => $name,
                ]);
            }
        }

        return true;
    }


}
