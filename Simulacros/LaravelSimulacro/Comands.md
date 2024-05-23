Comandos Básicos de Composer
Instalar Laravel:


composer create-project --prefer-dist laravel/laravel nombre-del-proyecto
Instalar Dependencias:


composer install
Actualizar Dependencias:


composer update
Agregar un Paquete:


composer require vendor/package
Eliminar un Paquete:


composer remove vendor/package
Actualizar Composer:


composer self-update
Comandos Básicos de Artisan
Mostrar la Lista de Comandos de Artisan:


php artisan list
Iniciar el Servidor de Desarrollo:


php artisan serve
Crear un Controlador:


php artisan make:controller NombreDelControlador
Crear un Modelo:


php artisan make:model NombreDelModelo
Crear una Migración:


php artisan make:migration nombre_de_la_migracion --create=nombre_de_la_tabla
Ejecutar Migraciones:


php artisan migrate
Revertir la Última Migración:


php artisan migrate:rollback
Crear una Fábrica:


php artisan make:factory NombreDeLaFabrica
Crear una Seed (semilla):


php artisan make:seeder NombreDelSeeder
Ejecutar Seeders:


php artisan db:seed
Crear una Middleware:


php artisan make:middleware NombreDelMiddleware
Limpiar Cache de Configuración:


php artisan config:cache
Limpiar Cache de Rutas:


php artisan route:cache
Limpiar Cache de Vistas:


php artisan view:clear
Generar una Clave de Aplicación:


php artisan key:generate