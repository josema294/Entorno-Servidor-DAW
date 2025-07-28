# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala la extensión mysqli para conectar con la base de datos
RUN docker-php-ext-install mysqli

# Opcional pero recomendado: habilita el módulo rewrite de Apache para URLs amigables
RUN a2enmod rewrite

# Copia el código de tu aplicación al directorio web del contenedor
COPY . /var/www/html/