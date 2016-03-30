# Example SPA gallery

The backend is a REST API based on [Symfony2](http://symfony.com)
and the frontend is a [Marionette](http://marionettejs.com) MVC application in Javascript.

## Installation

### Requirements

- [Composer](https://getcomposer.org/download)

### Steps

```bash
$ git clone https://github.com/diimpp/example-spa-gallery
$ composer install
$ php app/console doctrine:database:create
$ php app/console doctrine:schema:update --force
$ php app/console doctrine:fixtures:load -n
$ php app/console server:run
```

## Running tests

```bash
$ bin/phpspec run -fpretty
$ bin/phpunit
```

## License

[MIT](https://github.com/diimpp/example-spa-gallery/blob/master/LICENSE)
