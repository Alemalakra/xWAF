# xWAF - Web Application Firewall
Free Web Application Firewall, Open-Source.

# Features

- [x] XSS Vulns Fixed.
- [x] SQL Inyections Fixed.
- [x] HTML Malicious Code's Vulns Fixed.
- [x] CSRF Easy to use, and validation.
- [x] Lightweight.
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
// Cloudflare Option [Optional]
$xWAF->useCloudflare();
// useBlazingfast Option [Optional]
$xWAF->useBlazingfast();

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
