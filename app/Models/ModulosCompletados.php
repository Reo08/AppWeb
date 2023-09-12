<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulosCompletados extends Model
{
    use HasFactory;
    protected $table = "modulos_completados";
    protected $primaryKey = "id_m_completado";
    protected $guarded = [];
    
}
