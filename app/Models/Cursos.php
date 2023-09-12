<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;
    protected $table = "cursos";
    protected $primaryKey = "id_cursos";
    protected $guarded = [];

    public function getNombreCursoAttribute($value){
        return ucwords($value);
    }
    public function setNombreCursoAttribute($value){
        $this->attributes['nombre_curso'] = strtolower($value);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
