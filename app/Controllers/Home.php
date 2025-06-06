<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\HotelModel; // Importamos el modelo de hoteles

class Home extends Controller
{
    // Método para mostrar la página de inicio
    public function index()
    {
        helper('form'); // Cargar el helper de formularios para facilitar la validación

        // Aquí podrías agregar lógica si es necesario, por ejemplo:
        // Cargar el modelo de hotel si quieres mostrar alguna información relacionada
        $hotelModel = new HotelModel();
        $userId = 1; // Esto sería el ID del usuario autenticado
        $hotel = $hotelModel->getHotelByUserId($userId);

        // Pasar la información del hotel a la vista
        return view('home', ['hotel' => $hotel]);
    }
}
