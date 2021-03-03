# Laravel Searcher Package

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vaened/laravel-searcher/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vaened/laravel-searcher/?branch=master) [![Build Status](https://travis-ci.org/vaened/laravel-searcher.svg?branch=master)](https://travis-ci.org/vaened/laravel-searcher) [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md) 

Search engine builder for eloquent.

```php
// create a range date
$dates = new FullDayDates('1980-01-01', date('Y-m-d'));

// build query
$query = $this->searcher->bornBetween($dates)
    ->filter(['PHP_DEVELOPER'])
    ->knowledgeIn(['Laravel'])
    ->search('STATE', 'creative');

$query->paginate(); // laravel pagination
```

