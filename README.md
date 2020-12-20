# laravel-language-ja

![](https://github.com/blue32a/laravel-language-ja/workflows/Test/badge.svg)

[Laravel](https://github.com/laravel/laravel)の日本語リソース。

Japanese language resources for Laravel.

## Notice

This is mainly automatic translation.

## Installation

```console
$ composer require --dev blue32a/laravel-language-ja
```

## Usage

Publish language resources.

```console
$ php artisan vendor:publish --tag=blue32a-lang
```

Change application locale configuration.

```
'locale' => 'ja',
```
