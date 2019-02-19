Linio Util
==========
[![Latest Stable Version](https://poser.pugx.org/linio/util/v/stable.svg)](https://packagist.org/packages/linio/util) [![License](https://poser.pugx.org/linio/util/license.svg)](https://packagist.org/packages/linio/util) [![Build Status](https://secure.travis-ci.org/LinioIT/util.png)](http://travis-ci.org/LinioIT/util) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LinioIT/util/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LinioIT/util/?branch=master)

Linio Util is a generic component that provides many helper classes, such as
JSON parsing, conversion tools, data structures, etc.

Install
-------

The recommended way to install Linio Util is [through composer](http://getcomposer.org).

```bash
$ composer require linio/util
```

Tests
-----

To run the test suite, you need install the dependencies via composer, then
run PHPUnit.

```bash
$ composer install
$ vendor/bin/phpunit
```

JSON
----

The library includes a JSON wrapper around `json_encode` and `json_decode`,
allowing you to handle parsing errors with exceptions.

```php
<?php

Json::encode(['foo' => 'bar']);
Json::decode('{"foo":"bar"}');

```

Inflector
------

The library includes a small string manipulation library, with common operations
in string datatypes.

```php
<?php

Inflector::pascalize('my-test'); // MyTest
Inflector::camelize('my-test'); // myTest

```
