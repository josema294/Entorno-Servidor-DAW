# Usamos una imagen oficial que ya tiene PHP y el servidor web Apache.
# Puedes cambiar '8.2' por la versión de PHP que uses (ej: 8.1, 8.0, 7.4).
FROM php:8.2-apache

# Copiamos todo lo que está en esta carpeta (tu código)
# dentro del directorio web del contenedor.
COPY . /var/www/html/