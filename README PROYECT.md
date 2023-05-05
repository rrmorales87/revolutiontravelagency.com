## Requerimiento a instalar antes de correr el proyecto
- Instalar **PHP** version 8 para arriba.
- Instalar **composer**, es un paquete de instalacion de PHP
- Instalar **MySQL** server
- Instalar **NodeJS**
- Instalar **NPM o YARN** paquetes de Node JS

## Configuracion

- Crear en el root del proyecto un fichero .env copia del fichero .env-example, en el apendice de la base de dato DB poner la configuracion local del servidor de base de datos MySql
- Correr el comando **php artisan migrate** para crear las tablas necesarias en la base de datos.

## Correr el proyecto

- Usar el comando **yarn o npm run** y luego la opcion de build para que se compilen los asset del proyecto, ya sea cambios en css y javascript
- Usar el comando **php artisan serve** para arrancar un servidor de desarrollo local donde se puede probar el proyecto
