# php-sdk


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

````php
$config = new \NStack\Config('APP_ID', 'REST_KEY');
$nstack = new \NStack\NStack($config);
```
 
## Features

[x] Geographic continent 
[x] Geographic countries 
[ ] Geographic languages 
[ ] Geographic Ip addresses 
[ ] Geographic Timezones
[x] Content Localize resources
[ ] Content Localize languages
[ ] Content Localize proposals
[ ] Content Files
[ ] Content Collections
[ ] Notify updates
[ ] UGC pushlogs
[ ] Valitors

 

## 🏆 Credits

This package is developed and maintained by the PHP team at [Nodes](http://nodesagency.com)

## 📄 License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
