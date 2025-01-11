![php](https://img.shields.io/badge/php-%3E%3D%208.1-8892BF.svg)
[![github_workflow_status](https://img.shields.io/github/actions/workflow/status/locr-company/php-http-status-code/php.yml)](https://github.com/locr-company/php-http-status-code/actions/workflows/php.yml)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=locr-company_php-http-status-code&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=locr-company_php-http-status-code)
[![github_tag](https://img.shields.io/github/v/tag/locr-company/php-http-status-code)](https://github.com/locr-company/php-http-status-code/tags)
[![packagist](https://img.shields.io/packagist/v/locr-company/http-status-code)](https://packagist.org/packages/locr-company/http-status-code)

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
