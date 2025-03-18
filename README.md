# Instrucciones de Ejecución

Para ejecutar este proyecto, siga estos pasos:

1.  Modifique el archivo `php.ini` de XAMPP:

    *   Abra el archivo `php.ini` en un editor de texto (por ejemplo, el Bloc de notas). La ruta a este archivo es típicamente `XAMPP/PHP/php.ini`.
    *   Busque la línea `extension=zip`.
    *   Elimine el punto y coma (`;`) al principio de la línea para habilitar la extensión ZIP.

2.  Instale las dependencias de Composer:

    Para instalar las dependencias de Composer, ejecute el comando `composer install`.

3.  Copie el archivo `.env.example` a `.env`:

    Para copiar el archivo, ejecute el comando `copy .env.example .env`.

4.  Genere la clave de la aplicación:

    Para generar la clave de la aplicación, ejecute el comando `php artisan key:generate`.

5.  Ejecute las migraciones de la base de datos:

    Para ejecutar las migraciones de la base de datos, ejecute el comando `php artisan migrate`.

6. Actualizar base de datos y ingresar datos de usuario para login.

    Debes ejecutar el siguiente comando `php artisan migrate:refresh --seed`

8.  Inicie el servidor de desarrollo:

    Para iniciar el servidor de desarrollo, ejecute el comando `php artisan serve`.
