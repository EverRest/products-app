<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Task

Develop an application in Laravel, where the user is shown a list of products, which can be filtered using predefined filters.
Only official documentation sites are allowed
Mysql database. Minimum 25 products.
The contents of filters and their availability should be built dynamically based on the properties of the products. Non-existent filter combinations should be blocked or hidden.
Filters are grouped using “I”.
Pagination for 9 products
*Functionality must be covered with tests

## Set Up

- docker-compose up -d
- prepare .env file
- docker-compose run app composer i
- docker-compose run app npm i
- docker-compose run app npm run build
- docker-compose run app php artisan migrate
- docker-compose run app php artisan db:seed
- enjoy!


## Implementation
- Laravel 10
- Livewire
- MYSQL

