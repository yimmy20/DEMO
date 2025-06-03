<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        helper('form');  // <-- agrega esta línea para cargar el helper
        return view('home');
    }
}
