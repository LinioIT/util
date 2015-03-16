Linio Util
==========
[![Latest Stable Version](https://poser.pugx.org/linio/util/v/stable.svg)](https://packagist.org/packages/linio/util) [![License](https://poser.pugx.org/linio/util/license.svg)](https://packagist.org/packages/linio/util) [![Build Status](https://secure.travis-ci.org/LinioIT/util.png)](http://travis-ci.org/LinioIT/util) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/LinioIT/util/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/LinioIT/util/?branch=master)

Linio Util is a generic component that provides many helper classes, such as
JSON parsing, conversion tools, data structures, etc.

Install
-------

The recommended way to install Linio Util is [through composer](http://getcomposer.org).

```JSON
{
    "require": {
        "linio/util": "dev-master"
    }
}
```

Tests
-----

To run the test suite, you need install the dependencies via composer, then
run PHPUnit.

    $ composer install
    $ phpunit

JSON
----

The library includes a JSON wrapper around `json_encode` and `json_encode`,
allowing you to handle parsing errors with exceptions.

```php
<?php

Json::encode(['foo' => 'bar']);
Json::decode('{"foo":"bar"}');

```

String
------

The library includes a small string manipulation library, with common operations
in string datatypes.

```php
<?php

String::pascalize('my-test'); // MyTest
String::camelize('my-test'); // myTest

```
