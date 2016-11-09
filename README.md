# Laravel middleware for loggin vistors IP address on every request

# Installation

Via Composer

``` bash
$ composer require "hbernaciak/ip-logger":"1.0.0.@dev"
```

Add service provider to your app.php file to 'providers'

``` php
\Hbernaciak\IpLogger\IpLoggerServiceProvider::class
```

Publish & Migrate. Change the table name as you need.
``` bash
$ php artisan vendor:publish
$ php artisan migrate
```
