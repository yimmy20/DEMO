<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelModel extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table      = 'Hoteles';

    // Clave primaria de la tabla
    protected $primaryKey = 'Id';

    // Campos que se pueden insertar o actualizar en la base de datos
    protected $allowedFields = [
        'Nombre', 'Telefono', 'Website', 'Email', 'Descripcion', 'Direccion', 
        'Ciudad', 'CodigoPostal', 'Latitud', 'Longitud', 'Facebook', 'Twitter', 
        'Pinterest', 'Linkedin', 'WhatsApp', 'Instagram', 'Facturacion', 
        'UsuarioId', 'Calificacion', 'Estatus'
    ];

    // Tipo de retorno de las consultas (en este caso, un array)
    protected $returnType     = 'array';

    // Reglas de validación para los campos del modelo
    protected $validationRules = [
        'Nombre' => 'required',
        'Email'  => 'required|valid_email',
    ];

    // Si se establece a `true`, saltará la validación de campos antes de hacer la operación
    protected $skipValidation = false;

    // Relación con la tabla de usuarios
    public function getHotelByUserId($userId)
    {
        // Retorna el primer hotel que coincide con el UsuarioId
        return $this->where('UsuarioId', $userId)->first();
    }

    // Función para obtener hoteles filtrados por ciudad
    public function getHotelsByCity($city)
    {
        return $this->where('Ciudad', $city)->findAll();
    }

    // Función para obtener hoteles filtrados por calificación
    public function getHotelsByRating($rating)
    {
        return $this->where('Calificacion >=', $rating)->findAll();
    }

    // Función para obtener hoteles con un rango de precios basado en la facturación
    public function getHotelsByPriceRange($minPrice, $maxPrice)
    {
        return $this->where('Facturacion >=', $minPrice)
                    ->where('Facturacion <=', $maxPrice)
                    ->findAll();
    }

    // Función para contar el número de hoteles registrados
    public function countHotels()
    {
        return $this->countAll();
    }

    // Función para obtener el hotel con más reservas (puedes expandir esta consulta según tu modelo de reservas)
    public function getMostReservedHotel()
    {
        // Ejemplo de consulta para obtener el hotel más reservado, necesitarías definir la tabla y relación
        return $this->select('Hoteles.*, COUNT(Reservas.Id) as total_reservas')
                    ->join('Reservas', 'Reservas.HotelId = Hoteles.Id')
                    ->groupBy('Hoteles.Id')
                    ->orderBy('total_reservas', 'DESC')
                    ->first(); // Retorna el hotel con más reservas
    }
}
