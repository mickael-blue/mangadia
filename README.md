# Mangadia

Manga website Laravel 9 with Inertia and Reactjs


## Installation

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run artisan server:

```sh
php artisan serve
```

Go to: [http://127.0.0.1:8000/](http://127.0.0.1:8000/) in your browser, and login with:

- **Username:** admin@mangadia.com
- **Password:** password

## Running tests

To run the tests, run:

```
phpunit
```
