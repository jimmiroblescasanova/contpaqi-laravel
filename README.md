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

Las tablas de comercial estan declaradas como modelos de laravel, con el mismo nombre (ej. admClientes), a la cual existen algunos metodos para obtener la informacion. 

Ejemplo de scope para el modelo admClientes:
```php 
$clientes = admClientes::all();
```

## admClientes
Los scope para clientes son los siguientes: 

| Scope | Descripcion |
| ------ | ------ |
| buscarPorCodigo(string $codigo)   | Acepta un string con el codigo del cliente   |
| clientes() | Hace un filtrado de solamente los clientes y cliente-proveedor |
| proveedores() | Hace un filtrado de solamente los proveedores y clientes-proveedores |
| selectOptions() | Aplica el metodo pluck de laravel para devolver el ID y la Razon social |

Ejemplo de uso: 
```php 
$select = admClientes::clientes()->selectOptions();
```

## admConceptos
Para obtener la informacion de los conceptos del sistema se tienen las siguientes scope: 

| Scope | Descripcion | 
| ----- | -----|
| selectOptions() | Aplica el metodo pluck de laravel para devolver el ID y el nombre del concepto |

Y tambien con un par de funciones estaticas que devuelven datos concisos: 

| Funcion | Devuelve | Descripcion 
| ----- | ----- | -----
| ultimoFolio(int $concepto) | int | Devuelve el ultimo folio usado en el concepto 
| findById(int $concepto) | array | Devuelve un array con la informacion del concepto 

## admDocumentos
Para el modelo de los documentos, se cuentan con los siguientes scopes y funciones: 

| Scope | Descripcion 
| ----- | ----- 
| codigoConcepto(string $codigoConcepto) | Devuelve los documentos que pertenezcan al id del concepto indicado 
| buscarPorFolio(string\|int \$folio, string \$serie = null) | Realiza la busqueda de un documento en especifico, se requiere un folio y la serie es opcional
| facturas() | Hace un filtrado por todos los documentos con tipo de documento sea Factura 

Funciones: 
| Funcion | Devuelve | Descripcion 
| ----- | ----- | -----
| getLastId() | int | Devuelve el valor del ultimo id en la base de datos 

## Relaciones 
Ejemplos de los modelos con algunas relaciones existentes: 

```php 
$documento = admDocumentos::with('domicilios')->buscarPorFolio('1', 'A')->get();
```
Nos va a regresar una coleccion de laravel con los datos del documento y sus domicilios asociados. 

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
