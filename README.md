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

### With Docker

The project includes a PHP 8.3.36 CLI image for running Composer and the test
suite without installing PHP locally.

```bash
$ docker compose build
$ docker compose run --rm php composer install
$ docker compose run --rm php composer test
```

To run an individual Composer script, replace `composer test` with a script
such as `composer phpunit` or `composer phpstan`.

If an existing installation reports that PHP CS Fixer does not support PHP
8.3, update the development tools together:

```bash
$ docker compose run --rm php composer update friendsofphp/php-cs-fixer phpunit/phpunit phpstan/phpstan --with-all-dependencies
$ docker compose run --rm php composer test
```

This refreshes an older local lock file; `composer install` alone keeps the
locked versions. Do not bypass the fixer's PHP version check with
`PHP_CS_FIXER_IGNORE_ENV`.

The development tools use PHP CS Fixer 3.95+, PHPUnit 9.6, and PHPStan 2.2+.
PHPStan stays at level 8, the equivalent of `max` in the previous PHPStan 0.12
configuration.

If your network uses TLS inspection, ask your IT team for its root CA
certificate in PEM format. Do not disable Composer's TLS verification. Set
`CORPORATE_CA_CERT` to the certificate's path on your host, then use the
additional Compose file. It mounts the certificate and configures Composer to
trust it for both dependency installation and tests:

```bash
$ export CORPORATE_CA_CERT=/path/to/corporate-root-ca.crt
$ docker compose -f compose.yaml -f compose.ca.yaml run --rm php composer install
$ docker compose -f compose.yaml -f compose.ca.yaml run --rm php composer test
```

Use the same `-f compose.yaml -f compose.ca.yaml` options for dependency updates
when your network requires the corporate CA.

Run `composer test` only after `composer install` succeeds; otherwise test
tools such as `php-cs-fixer` will not be installed. The CA certificate is
mounted at runtime and appended to the system CA bundle for Composer only. It
is not added to the repository or Docker image.

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
