<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Cursos;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $curso1 = new Cursos();
        $curso1->nombre_curso = "Curso de prueba";
        $curso1->slug = Str::slug("Curso de prueba",'-');
        $curso1->descripcion = "Descripcion del curso de prueba";
        $curso1->save();
    }
}
