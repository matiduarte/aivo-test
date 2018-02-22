# Aivo Test

Resolución del ejercicio propuesto por la empresa Aivo. El mismo fue desarrollado en PHP utilizando el framework [Laravel](https://laravel.com/).

La idea del ejercicio es desarrollar una API para obtener información de un perfil de Facebook a través de algun ID.

## Comenzar

#### Pre-requisitos

Antes de utilizar la aplicación, asegúrese de tener instalado [Composer](https://getcomposer.org/), ya que es un requisito necesario para poder utilizarla.

#### Descarga

Abrir una terminal y ejecturar:

```
$ git clone https://github.com/matiduarte/aivo-test.git
```

### Instalación

Un vez finalizada la descarga, dirigirse al directorio aivo_test con el comando
``
cd aivo_test/
``
y ejecutar:

```
$ composer install
```

Esto instalará todas las dependencias necesarias para poder correr la aplicación.

### Servidor Local

Dentro de la carpeta del proyecto, debera levantar el servidor ejecutando el siguiente comando:

```
$ php artisan serve
```
Por defecto el puerto asignado es el 8000, en caso de querer modificar el puerto deberá ingresar el siguiente comando:

```
$  php artisan serve --port=8080
```

## Uso de la API

Para poder probar la API, deberá abrir su navegador e ingresar la siguiente URL

#### Consultar perfil Usuario:

>URL: http://localhost:8000/api/profile/facebook/{id}

```
Response:
{
    data: {
        name: "Mati Duarte",
        id: "10214896922593764"
    },
    status: 200
}
```

Si el id ingresado es incorrecto se devolverá el error correspondiente con toda su información
>URL: http://localhost:8000/api/profile/facebook/***

```
Response:
{
    error: {
        message: "(#803) Some of the aliases you requested do not exist: ***",
        type: "OAuthException",
        code: 803,
        error_subcode: -1
    },
    status: 404
}
```

## Tests

Para poder correr las pruebas, dentro de la carpeta del proyecto ingresar el siguiente comando:
```
$  vendor/bin/phpunit
```