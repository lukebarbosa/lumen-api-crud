# Lumen API CRUD with TDD

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We
believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain
out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction,
queueing, and caching.

> **Note:** In the years since releasing Lumen, PHP has made a variety of wonderful performance improvements. For this
> reason, along with the availability of [Laravel Octane](https://laravel.com/docs/octane), we no longer recommend that
> you begin new projects with Lumen. Instead, we recommend always beginning new projects
> with [Laravel](https://laravel.com).

## Run the project

Install commands:

```
git clone https://github.com/lukebarbosa/lumen-api-crud.git
```

```
composer install
```

#### configure .env

```
php artisan migrate
```

```
php -S localhost:8000 -t public
```

### Use Postman to test the API.

#### GET - List all user

```
http://localhost:8000/users
```

#### GET - Find user by id

```
http://localhost:8000/users/1
```

#### POST - Create new user

- Insert name, email and password

```
http://localhost:8000/users
```

#### PUT - Update user

- Update name, email or password

```
http://localhost:8000/users/1
```

#### DELETE - Delete user

```
http://localhost:8000/users/1
```

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
