<?php

namespace Database\Seeders;

use App\Models\InfoUsuarios;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new User();
        $usuario->identificacion = "1000267865";
        $usuario->nombre = "Super Administrador";
        $usuario->correo = "admin@gmail.com";
        $usuario->contrasena = md5('Admin12345');
        $usuario->rol = "profesor";
        $usuario->admin = 1;
        $usuario->save();

        $infoUsuarios =  new InfoUsuarios();
        $infoUsuarios->identificacion = "1000267865";
        $infoUsuarios->save();
    }
}
