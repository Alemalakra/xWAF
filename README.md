# xWAF - Web Application Firewall
Original Free Web Application Firewall, Open-Source.

# Features

- [x] XSS Vulns Fixed.
- [x] SQL Injection Fixed.
- [x] Anti-Cookie-Steal Method.
- [x] HTML Malicious Code's Vulns Fixed.
- [x] CSRF Easy to use, and validation.
- [x] Block HTML Upgraded.
- [x] Lightweight.
- [x] Array Support, All Bypass fixed.
- [x] Advanced Bot validation, Browser Validation.
- [x] Most Poc's SQLi and XSS.
- [x] Security upgraded.
- [x] Errors supression.
- [x] Cloudflare and BlazingFast Support.

# Sample Usage
```php
// Before all your code starts.
require('xwaf.php');
$xWAF = new xWAF();
$xWAF->start();
// Your code below.
```
# Advanced Usage
```php
// Before of all your CODE.
require('xwaf.php');
$xWAF = new xWAF();
// Cloudflare Mode [Optional]
$xWAF->useCloudflare();
// BlazingFast Mode [Optional]
$xWAF->useBlazingfast();
// Use Own IP Header [Optional]
$xWAF->customIPHeader('IP-Header');
// Anti-Cookie-Steal Method [Optional]
$xWAF->antiCookieSteal('username'); // For trigger if on PHPSESSID is logged.

// Check separated types.
$xWAF->checkGET();
$xWAF->checkPOST();
$xWAF->checkCOOKIE();
// Your code below.
```
# CSRF Validation Example
Please read test.php

# Requirements

- [x] Min: PHP5.3 (With common functions)
