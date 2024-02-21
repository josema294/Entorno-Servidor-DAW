# Enunciado

Queremos crear una web de una inmobiliaria en internet, no queremos que sea tan grande
como un fotocasa o idealista,
**Normas:**
- Es una práctica donde se usara HTML5,CSS3 y PHP junto a una Base   de Datos Mysql. Con temas de diseño y seguridad. Usando sesiones en la web.

- ##### Mirar plantilla base datos al final del documento


# Estructura del Sistema

## 1. Parte Backend: Administración

La sección backend está diseñada para la gestión y administración del sistema, accesible únicamente por usuarios con el rol de *administrador*. Las funcionalidades clave incluyen:

- **Gestión de Usuarios**
  - Crear (Alta)
  - Eliminar (Baja)
  - Buscar
  - Modificar
  - Listar

- **Gestión de Pisos**
  - Crear (Alta)
  - Eliminar (Baja)
  - Buscar
  - Modificar
  - Listar

## 2. Parte Frontend: Clientes

La interfaz de usuario para clientes permite el registro y acceso a funcionalidades específicas basadas en su rol, ya sea como compradores o vendedores.

### Registro y Acceso

- Los clientes deben registrarse a través de un formulario y sus datos son almacenados en la base de datos (BBDD).
- Implementación de un sistema de login que permite el acceso solo a usuarios registrados en la BBDD.

### Roles de Clientes

- **Compradores**: Capaces de buscar pisos disponibles y proceder a la compra.
- **Vendedores**: Permitidos para registrar nuevos pisos con sus respectivos detalles.

### Sesiones

- Uso de sesiones para mantener a los usuarios autenticados en la plataforma.

## 3. Parte Frontend: Acceso Público

- Visibilidad de los pisos registrados en la BBDD para cualquier usuario, sin necesidad de estar registrado o logueado.
- Restricciones para la compra o registro de nuevos pisos, limitado solo a usuarios autenticados.

# Plantilla de Base de datos

Creación de tablas:
CREATE TABLE usuario (
usuario_id int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombres varchar(35) NOT NULL,
correo varchar(100) NOT NULL,
clave varchar(80) NOT NULL,
tipo_usuario varchar(20));

CREATE TABLE pisos (
    Codigo_piso INT PRIMARY KEY,
    calle VARCHAR(40) NOT NULL,
    numero INT NOT NULL,
    piso INT NOT NULL,
    puerta VARCHAR(5) NOT NULL,
    cp INT NOT NULL,
    metros INT NOT NULL,
    zona VARCHAR(15),
    precio FLOAT NOT NULL,
    imagen VARCHAR(100) NOT NULL,
    usuario_id INT(5),
    FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);


CREATE TABLE comprados (
usuario_comprador int(5)references usuario(usuario_id),
Codigo_piso int references pisos(Codigo_piso) ,
Precio_final float NOT NULL);


