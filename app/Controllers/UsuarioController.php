<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->findAll(); // Obtiene todos los usuarios

        return view('usuarios_view', ['usuarios' => $usuarios]);
    }

    public function crear()
    {
        $usuarioModel = new UsuarioModel();
        
        // Datos para insertar
        $usuarioModel->save([
            'Nombre'  => 'Juan Pérez',
            'Email'   => 'juan@correo.com',
            'Password'=> '123456',
            'Estatus' => 1,
        ]);
        
        return redirect()->to('/usuarios');
    }
}
