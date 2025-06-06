<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function login()
    {
        return view('home'); // Cargar la vista de login (home.php)
    }

    // Procesar el login
    public function processLogin()
    {
        $usuarioModel = new UsuarioModel(); // Modelo de usuarios

        // Validación del formulario de login
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[6]',
            ];

            if (!$this->validate($rules)) {
                return view('home', ['validation' => $this->validator]); // Si hay errores de validación
            }

            // Buscar el usuario en la base de datos
            $usuario = $usuarioModel->where('email', $this->request->getPost('email'))->first();

            if ($usuario && password_verify($this->request->getPost('password'), $usuario['password'])) {
                // Iniciar sesión
                session()->set('user_id', $usuario['id']);
                return redirect()->to('/dashboard'); // Redirigir al dashboard
            } else {
                return view('home', ['error' => 'Credenciales incorrectas']); // Si las credenciales no son correctas
            }
        }
    }

    // Mostrar el formulario de registro
    public function register()
    {
        return view('home'); // Cargar la vista de registro (home.php)
    }

    // Procesar el registro
    public function processRegister()
    {
        $usuarioModel = new UsuarioModel(); // Instanciamos el modelo de usuarios

        // Validación del formulario de registro
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nombre'  => 'required|min_length[3]',
                'email'   => 'required|valid_email|is_unique[usuarios.email]', // El email debe ser único
                'password'=> 'required|min_length[6]',
                'password_confirm' => 'matches[password]', // Asegurarse de que las contraseñas coincidan
            ];

            if (!$this->validate($rules)) {
                return view('home', ['validation' => $this->validator]); // Si hay errores de validación
            }

            // Guardar el nuevo usuario en la base de datos
            $usuarioModel->save([
                'nombre' => $this->request->getPost('nombre'),
                'email'  => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), // Hasheamos la contraseña
            ]);

            return redirect()->to('/login'); // Redirigir al login después de registrar
        }
    }
}
