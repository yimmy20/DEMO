<?php

namespace App\Models;

use CodeIgniter\Model;

class HabitacionModel extends Model
{
    protected $table      = 'Habitaciones';
    protected $primaryKey = 'Id';

    protected $allowedFields = [
        'Titulo', 'PalabrasClave', 'Descripcion', 'Costo', 'Adultos', 
        'Ninos', 'Infantes', 'MaximoAdultos', 'MaximoNinos', 'MaximoInfantes', 
        'CostoAdicionalAdulto', 'CostoAdicionalNino', 'CostoAdicionalInfante', 
        'HotelId'
    ];

    protected $returnType     = 'array';

    protected $validationRules = [
        'Titulo' => 'required',
        'Costo'  => 'required|decimal',
        'HotelId'=> 'required|integer',
    ];

    protected $skipValidation     = false;
}
