<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    use HasFactory;
    protected $table = "modulos";
    protected $primaryKey = "id_modulos";
    protected $guarded = [];

    public function getNombreModuloAttribute($value){
        return ucwords($value);
    }
    public function setNombreModuloAttribute($value){
        $this->attributes['nombre_modulo'] = strtolower($value);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
