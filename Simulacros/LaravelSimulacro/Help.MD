En un proyecto Laravel, el código que maneja la interacción con la base de datos y la lógica del formulario se organiza siguiendo la estructura y las convenciones del framework. Aquí te muestro cómo podrías adaptar el ejemplo anterior para un proyecto Laravel, organizando el código en los controladores, modelos y vistas apropiados.

Estructura del Proyecto Laravel
Controlador: Crear un controlador para manejar la lógica del formulario y la base de datos.
Modelo: Crear un modelo para interactuar con la tabla usuarios.
Vistas: Crear vistas para mostrar el formulario y la lista de usuarios.
Paso 1: Crear el Modelo
En Laravel, los modelos se colocan en app/Models. Primero, crea un modelo llamado User para la tabla usuarios.


php artisan make:model User
Esto creará un archivo de modelo en app/Models/User.php. Edita este archivo para que coincida con la estructura de la tabla usuarios.

php
Copiar código
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    // Campos que pueden ser asignados masivamente
    protected $fillable = ['nombre', 'email', 'edad'];
}
Paso 2: Crear el Controlador
Los controladores se colocan en app/Http/Controllers. Crea un controlador para manejar la lógica de la aplicación.


php artisan make:controller UserController
Edita el archivo UserController.php en app/Http/Controllers:

php
Copiar código
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'edad' => 'required|integer',
        ]);

        // Crear un nuevo usuario
        User::create($request->all());

        // Redirigir de nuevo a la página principal con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }
}
Paso 3: Crear las Vistas
Las vistas se colocan en resources/views. Crea una carpeta llamada usuarios y dentro de ella crea un archivo index.blade.php.

resources/views/usuarios/index.blade.php:

php
Copiar código
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        thead {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Agregar Nuevo Usuario</h2>
<form action="{{ route('usuarios.store') }}" method="post">
    @csrf
    <label>Nombre:</label>
    <input name="nombre" type="text" required></input><br>
    <label>Correo:</label>
    <input name="email" type="email" required></input><br>
    <label>Edad:</label>
    <input name="edad" type="number" required></input><br>
    <button type="submit">Enviar datos</button>
</form>

<h2>Lista de Usuarios</h2>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nombre }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->edad }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
Paso 4: Definir las Rutas
Las rutas se definen en routes/web.php. Agrega las rutas necesarias para mostrar el formulario y manejar la inserción de datos.

routes/web.php:

php
Copiar código
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'index'])->name('usuarios.index');
Route::post('/store', [UserController::class, 'store'])->name('usuarios.store');
Resumen
Modelo: app/Models/User.php para representar la tabla usuarios.
Controlador: app/Http/Controllers/UserController.php para manejar la lógica de mostrar usuarios y agregar nuevos usuarios.
Vistas: resources/views/usuarios/index.blade.php para el formulario y la lista de usuarios.
Rutas: Definir las rutas en routes/web.php para manejar las solicitudes de visualización y almacenamiento.
Este enfoque sigue la estructura y las convenciones de Laravel, lo que facilita la gestión y la escalabilidad del código.