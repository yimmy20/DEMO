<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        helper(['form', 'url']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nombre' => 'required|min_length[3]|max_length[100]',
                'telefono' => 'permit_empty|numeric|max_length[15]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]',
                'password_confirm' => 'required|matches[password]'
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();
                $data = [
                    'nombre' => $this->request->getPost('nombre'),
                    'telefono' => $this->request->getPost('telefono'),
                    'email' => $this->request->getPost('email'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
                ];

                if ($userModel->insert($data)) {
                    return redirect()->to('/login')->with('success', 'Usuario registrado exitosamente.');
                } else {
                    return redirect()->back()->with('error', 'Error al registrar el usuario.');
                }
            } else {
                return redirect()->back()->with('validation_errors', $this->validator->listErrors())->withInput();
            }
        }

        return view('auth/register_view');
    }

    public function login()
    {
        helper(['form', 'url']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required'
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();
                $user = $userModel->where('email', $this->request->getPost('email'))->first();

                if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                    // Login exitoso - crear sesión
                    $session = session();
                    $session->set([
                        'user_id' => $user['id'],
                        'user_name' => $user['nombre'],
                        'user_email' => $user['email'],
                        'logged_in' => true
                    ]);

                    return redirect()->to('/dashboard')->with('success', 'Bienvenido ' . $user['nombre']);
                } else {
                    return redirect()->back()->with('error', 'Email o contraseña incorrectos.');
                }
            } else {
                return redirect()->back()->with('validation_errors', $this->validator->listErrors())->withInput();
            }
        }

        return view('auth/login_view');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login')->with('success', 'Has cerrado sesión correctamente.');
    }
}