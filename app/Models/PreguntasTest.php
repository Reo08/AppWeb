<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntasTest extends Model
{
    use HasFactory;
    protected $table = "preguntas_test";
    protected $primaryKey = "id_preguntas";
    protected $guarded = [];

    public function getPreguntaAttribute($value){
        return ucfirst($value);
    }

    public function setPreguntaAttribute($value){
        $this->attributes['pregunta'] = strtolower($value);
    }
}
