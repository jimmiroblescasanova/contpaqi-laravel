# Paquete para conectar las bases de datos SQL de CONTPAQi a Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jimmiroblescasanova/contpaqi-laravel.svg?style=flat-square)](https://packagist.org/packages/jimmiroblescasanova/contpaqi-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jimmiroblescasanova/contpaqi-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/jimmiroblescasanova/contpaqi-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jimmiroblescasanova/contpaqi-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/jimmiroblescasanova/contpaqi-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jimmiroblescasanova/contpaqi-laravel.svg?style=flat-square)](https://packagist.org/packages/jimmiroblescasanova/contpaqi-laravel)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/contpaqi-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/contpaqi-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require jimmiroblescasanova/contpaqi-laravel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="contpaqi-config"
```

Definir la conexion a la base de datos en el archivo env
```php
CONTPAQI_HOST=10.8.0.1
CONTPAQI_DATABASE=adAGROTERRA
CONTPAQI_USER=sa
CONTPAQI_PSW="JRC$$159753"
```

## Usage

```php
$contpaqiLaravel = new jimmirobles\ContpaqiLaravel();
echo $contpaqiLaravel->echoPhrase('Hello, jimmirobles!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jimmi Robles](https://github.com/jimmiroblescasanova)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
