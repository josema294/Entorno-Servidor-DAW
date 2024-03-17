<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        // Recupera todos los usuarios de la base de datos
        // $usuarios = Usuario::all();
        
                        // Simular datos de usuarios como un array de objetos estándar de PHP
                        $usuarios = collect([ // Usamos collect() para simular el resultado de Eloquent
                            (object)[
                                'id' => 1,
                                'nombre' => 'Juan',
                                'apellidos' => 'Pérez',
                            ],
                            (object)[
                                'id' => 2,
                                'nombre' => 'Ana',
                                'apellidos' => 'López',
                            ],
                        
                        ]);
    
        
       
        // Pasa la colección de usuarios a la vista
        return view('formcrud', compact('usuarios'));
    }
}