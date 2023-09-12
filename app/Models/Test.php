<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $table = "test";
    protected $primaryKey = "id_test";
    protected $guarded = [];

    public function getNombreTestAttribute($value){
        return ucwords($value);
    }
    public function setNombreTestAttribute($value){
        $this->attributes['nombre_test'] = strtolower($value);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
