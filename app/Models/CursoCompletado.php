<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoCompletado extends Model
{
    use HasFactory;
    protected $table = "curso_completado";
    protected $primarykey = "id_curso_completado";
    protected $guarded = [];
}
