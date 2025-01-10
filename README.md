![php](https://img.shields.io/badge/php-%3E%3D%208.2-8892BF.svg)
[![codecov](https://codecov.io/bb/locr/php-http-status-code/branch/main/graph/badge.svg?token=A73J73CSCM)](https://codecov.io/bb/locr/php-http-status-code)

# 1. Installation

## 1.1. edit composer.json

Add the following lines into your composer.json file of your project!

```json
{
    ...
    "require": {
        ...
        "locr/http-status-code": "^1.1"
    },
    ...
    "repositories": [
        ...
        {
            "type": "vcs",
            "url": "git@bitbucket.org:locr/php-http-status-code.git"
        }
    ]
}
```

## 1.2. install composer dependency

```bash
composer install
```

# 2. Development

Install [Composer](https://getcomposer.org/)

Clone the repository

```bash
git clone git@bitbucket.org:locr/php-http-status-code.git
cd php-http-status-code && composer install
```

# 3. Usage

StatusCode is a [Backed enum](https://www.php.net/manual/en/language.enumerations.backed.php) with some extra functions.

```php
<?php

use Locr\Lib\HTTP\StatusCode;

print StatusCode::OK->value;         // output: 200
print StatusCode::OK->message();     // output: OK
print StatusCode::OK->buildHeader(); // output: HTTP/1.1 200 OK

var_dump(StatusCode::OK->isInformationalCode()); // output: bool(false)
var_dump(StatusCode::OK->isSuccessCode());       // output: bool(true)
var_dump(StatusCode::OK->isRedirectionCode());   // output: bool(false)
var_dump(StatusCode::OK->isClientErrorCode());   // output: bool(false)
var_dump(StatusCode::OK->isServerErrorCode());   // output: bool(false)
```
