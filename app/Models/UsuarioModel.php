<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    //nombre tabla
    protected $table = "Usuarios";

    //clave primaria
    protected $primaryKey = "Id";

    //campos
    protected $allowedFields = ["Nombre","Telefono","Email","Password","Estatus","UsuarioId2PaPe","Foto","Puesto"];

    // Tipo entorno de la consulta
    protected $returnType = True;

    // Validación
    protected $validationRules = [
        'Email' => 'required|valid_email',
        'Password'=> 'required|min_length[6]',
        'Nombre'=> 'required',
    ];



    
    // COSAS OPCIONALES
    //Mensaje de validación 
    protected $validationMessages = [];


    //Si se omiten valores de validación
    protected $skipValidation = false;
}