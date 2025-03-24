<?php

namespace App\Models;

use CodeIgniter\Model;

class CatalogoModel extends Model
{
    protected $table = 'catalogo';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'precio'];
}
