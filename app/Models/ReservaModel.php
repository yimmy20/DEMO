<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table      = 'Reservas';
    protected $primaryKey = 'Id';

    protected $allowedFields = [
        'Folio', 'FechaCreacion', 'FechaReservaInicia', 'FechaReservaFinaliza', 
        'CostoTotal', 'Estatus', 'Email', 'Nombres', 'Apellidos', 'Telefono', 
        'Pais', 'Estado', 'Municipio', 'Direccion', 'CodigoPostal', 
        'RequerimientosEspeciales', 'ReferenciaPago', 'Tipo', 'HotelId'
    ];

    protected $returnType     = 'array';

    protected $validationRules = [
        'Folio' => 'required|alpha_numeric',
        'CostoTotal' => 'required|decimal',
        'HotelId' => 'required|integer',
    ];

    protected $skipValidation     = false;
}
