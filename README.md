# Exchange rates RSS-Feed (Laravel)

Fresh installation for new project

## Installation

Install NPM Dependencies

```bash
$ npm install
```

Run NPM in development or production mode

```bash
$ npm run dev
$ npm run prod
```

Install Composer Dependencies

```bash
$ composer install
```

Create a copy of your .env file

```bash
$ cp .env.example .env
```

Generate an app encryption key

```bash
$ php artisan key:generate
```

Fill .env file with your database settings and migrate the database

```bash
$ php artisan migrate
```

To gain data run console command manually

```bash
$ php artisan rates:update
```

Afterwards add Laravel scheduler to your servers cron list

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```


## Usage ( local )

```bash
$ php artisan serve
```
