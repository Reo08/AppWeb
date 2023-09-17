<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modulos;
use Illuminate\Support\Str;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modulo1 = new Modulos();
        $modulo1->nombre_modulo = "Nombre del primer modulo";
        $modulo1->slug = Str::slug("Nombre del primer modulo",'-');
        $modulo1->desc_modulo = "Esta es una descripcion del modulo";
        $modulo1->id_cursos = 1;
        $modulo1->save();
    }
}
