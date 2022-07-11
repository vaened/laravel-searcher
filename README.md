# Laravel Searcher Package

[![Build Status](https://github.com/vaened/laravel-searcher/actions/workflows/tests.yml/badge.svg)](https://github.com/vaened/laravel-searcher/actions?query=workflow%3ATests) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vaened/laravel-searcher/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vaened/laravel-searcher/?branch=master) [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md) 

Search engine builder for eloquent.

```php
// create a range date
$dates = new FullDayDates('1980-01-01', date('Y-m-d'));

// build query
$query = $this->searcher->bornBetween($dates)
    ->filter([Profession::PHP_DEVELOPER])
    ->knowledgeIn([Framework::LARAVEL])
    ->search(Index::STATUS, 'available');

$query->paginate(); // laravel pagination
```
