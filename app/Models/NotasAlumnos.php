<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotasAlumnos extends Model
{
    use HasFactory;
    protected $table = "notas_alumnos";
    protected $primaryKey = "id_nota";
    protected $guarded =  [];
}
