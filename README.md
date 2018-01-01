# xWAF - Web Application Firewall
Original Free Web Application Firewall, Open-Source.

# Features

- [x] XSS Vulns Fixed.
- [x] SQL Inyections Fixed.
- [x] HTML Malicious Code's Vulns Fixed.
- [x] CSRF Easy to use, and validation.
- [x] Lightweight.
- [x] Array Support, All Bypass fixed.
- [x] Advanced Bot validation, Browser Validation.
- [x] Security upgraded.
- [x] Cloudflare and BlazingFast Support.

# Sample Usage
```php
// Before of all your CODE.
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

// Check separated types.
$xWAF->checkGET();
$xWAF->checkPOST();
$xWAF->checkCOOKIE();
// Your code below.
```
# CSRF EXample
Please read test.php

# Requirements

- [x] PHP5.x+ (With common functions)
- [x] Brain
