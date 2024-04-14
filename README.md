# Paquete para conectar las bases de datos SQL Server de CONTPAQi Comercial a Laravel

Sencillo paquete (aun en desarrollo) para conectar de forma más rapida las bases de datos de una empresa contpaqi comercial a laravel.

La principal caracteristica es facilitar el uso de las tablas del sistema con los metodos de laravel, para (por el momento) leer la información.

## Instalación

Para instalar el paquete via composer:

```bash
composer require jimmiroblescasanova/contpaqi-laravel
```

Despues es necesario publicar el archivo de configuración:

```bash
php artisan vendor:publish --tag="contpaqi-config"
```
Una vez exportado el archivo de configuración se requiere definir la conexión a la empresa contpaqi. 

Se debe agregar la siguiente información al archivo .env
```php
CONTPAQI_HOST=localhost
CONTPAQI_DATABASE=adMI_EMPRESA_COMERCIAL
CONTPAQI_USER=sa
CONTPAQI_PSW="password"
```

## Usage

```php
$contpaqiLaravel = new jimmirobles\ContpaqiLaravel();
echo $contpaqiLaravel->echoPhrase('Hello, jimmirobles!');
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
