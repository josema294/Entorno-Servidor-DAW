<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function __invoke(Request $request)
    {
        // Verificar si es una petición POST
        if ($request->isMethod('post')) {
            // Realizar la validación de los datos
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Intentar loguear al usuario
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                // Redireccionar al usuario autenticado a la página que desees
                return redirect()->intended('products');
            }

            // Si la autenticación falla, enviar de nuevo al login con un mensaje de error
            return back()->withErrors([
                'email' => 'Usuario incorrecto.',
            ]);
        }

        // Mostrar la vista de login si no es una petición POST
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

