<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoUsuarios extends Model
{
    use HasFactory;
    protected $table = "info_usuarios";
    protected $primaryKey =  "id_info_usuarios";
    protected $guarded = [];

    public function getCiudadAttribute($value){
        return ucwords($value);
    }
    public function setCiudadAttribute($value){
        $this->attributes["ciudad"] = strtolower($value);
    }
}
