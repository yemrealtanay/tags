<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->



<!-- PROJECT LOGO -->
<br />
<h3 align="center">Yemrealtanay/tags</h3>

  <p align="center">
    Laravel Composer Library
    <br />
    <a href="https://github.com/yemrealtanay/tags/"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    ·
    <a href="https://github.com/yemrealtanay/tags/issues">Report Bug</a>
    ·
    <a href="https://github.com/yemrealtanay/tags/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

You can add and use tags for your models for any time! This package is a simplified version of the spatie laravel tags package.
If you want to more detailed tag package please visit: https://spatie.be/docs/laravel-tags/v4/introduction
<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built For

[![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* need
  ```sh
  "php": "^8.0",
        "laravel/framework": "^8.67|^9.0"
  ```

### Installation

1. * composer
  ```sh
  composer require Yemrealtanay/tags
  ```

2. vendor publish for migrations
```sh
    php artisan vendor:publish --provider="YemreAltanay\Tags\TagsServiceProvider" --tag="tags-migrations"
```
3. vendor publish for config file
```sh
    php artisan vendor:publish --provider="Yemrealtanay\Tags\TagsServiceProvider" --tag="tags-config"
```
4. migrate
```sh
    php artisan migrate
```
<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

```php
    use Yemrealtanay\Tags\HasTags
    
    
    User::attachTags(['tag1', 'tag2', 'tag3']);

    User::detachTags(['tag1', 'tag2']);
```

<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Your Name - Yunus Emre Altanay - yunus.altanay@iceberg-digital.co.uk

Project Link: [https://github.com/yemrealtanay/tags/](https://github.com/yemrealtanay/tags/)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
