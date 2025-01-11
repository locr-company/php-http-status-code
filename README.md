![php](https://img.shields.io/badge/php-%3E%3D%208.1-8892BF.svg)

# 1. Installation

```bash
composer require locr-company/http-status-code
```

# 2. How to use

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

# 3. Development

Clone the repository

```bash
git clone git@github.com:locr-company/php-http-status-code.git
cd php-http-status-code && composer install
```

# 4. Publish a new version

```bash
# update CHANGELOG.md file

git tag -a <major>.<minor>.<patch> -m 'version <major>.<minor>.<patch>'
git push
git push origin --tags
```
