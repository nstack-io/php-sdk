# php-sdk
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nstack-io/php-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nstack-io/php-sdk/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/nstack-io/php-sdk/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/nstack-io/php-sdk/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/nstack-io/php-sdk/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nstack-io/php-sdk/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/nstack-io/php-sdk/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)


## 📝 Introduction

An API wrapper for nstack.io API

## 📦 Installation

To install this package you will need:

* PHP 7.1+

Run 

`composer require nstack/php-sdk`

or setup in composer.json

`nstack/php-sdk: 1.0.x`

## ⚙ Usage

```php
$config = new \NStack\Config('APP_ID', 'REST_KEY');
$nstack = new \NStack\NStack($config);
```
 
## Features

    [x] Geographic continent
    [x] Geographic countries
    [x] Geographic languages
    [x] Geographic Timezone
    [x] Geographic Timezones
    [x] Geographic Ip addresses
    [x] Content Localize resources
    [x] Content Localize languages
    [x] Content Localize proposals
    [ ] Content Files
    [ ] Content Collections
    [ ] Notify updates
    [ ] UGC pushlogs
    [ ] Valitors

## 🏆 Credits

This package is developed and maintained by the PHP team at [Nodes](http://nodesagency.com)

## 📄 License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
