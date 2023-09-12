<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PAlumnoController;
use App\Http\Controllers\PlataformaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// 
Route::get('/', IndexController::class)->name('index');
Route::post('login', [PlataformaController::class, 'login'])->name('login');

Route::middleware('auth')->group(function(){
    Route::post('cerrarSesion', [PlataformaController::class , 'cerrarSesion'])->name('cerrarSesion');

    Route::get('area-personal', [PlataformaController::class, 'areaPersonal'])->name('area-personal');
    Route::get('area-personal/administrar', [PlataformaController::class, 'administrar'])->name('administrar');
    Route::get('area-personal/administrar/crear-curso', [PlataformaController::class,'crearCurso'])->name('administrar.crear-curso');
    Route::post('creando-curso', [PlataformaController::class, 'creandoCurso'])->name('creando-curso');
    Route::get('area-personal/administrar/vincular-profesor', [PlataformaController::class, 'vincularProfesor'])->name('administrar.vincular-profesor');
    Route::put('vinculando-profesor', [PlataformaController::class, 'vinculandoProfesor'])->name('vinculando-profesor');
    Route::get('area-personal/administrar/desvincular-profesor', [PlataformaController::class, 'desvincularProfesor'])->name('administrar.desvincular-profesor');
    Route::put('desvinculando-profesor', [PlataformaController::class, 'desvinculandoProfesor'])->name('desvinculandoProfesor');
    Route::get('area-personal/administrar/inscribir-alumno',[PlataformaController::class,'inscribirAlumno'])->name('administrar.inscribirAlumno');
    Route::post('inscribiendo-alumno', [PlataformaController::class, 'inscribiendoAlumno'])->name('inscribiendoAlumno');
    Route::get('area-personal/administrar/eliminar-inscripcion', [PlataformaController::class, 'eliminarInscripcion'])->name('administrar.eliminarInscripcion');
    Route::delete('eliminando-inscripcion', [PlataformaController::class, 'eliminandoInscripcion'])->name('eliminandoInscripcion');

    Route::get('area-personal/mis-cursos', [PlataformaController::class, 'misCursos'])->name('area-personal.mis-cursos');
    Route::get('area-personal/notas', [PlataformaController::class, 'notas'])->name('area-personal.notas');


    Route::get('area-personal/configuracion', [PlataformaController::class, 'configuracion'])->name('area-personal.configuracion');
    Route::get('area-personal/configuracion/cambiar-contrasena', [PlataformaController::class, 'cambiarContrasena'])->name('cambiar-contrasena');
    Route::put('cambiando-contrasena', [PlataformaController::class, 'cambiandoContrasena'])->name('cambiando-contrasena');

    Route::get('area-personal/perfil', [PlataformaController::class, 'perfil'])->name('area-personal.perfil');
    Route::get('area-personal/perfil/editar', [PlataformaController::class, 'editarPerfil'])->name('area-personal.perfil.editarPerfil');
    Route::put('editando-perfil', [PlataformaController::class, 'editandoPerfil'])->name('editando-perfil');
    Route::put('editando-img', [PlataformaController::class, 'editandoImg'])->name('editando-img');

    Route::get('area-personal/cuentas', [PlataformaController::class, 'cuentas'])->name('area-personal.cuentas');
    Route::get('area-personal/cuentas/agregar-profesor', [PlataformaController::class, 'agregarProfesor'])->name('area-personal.cuentas.agregarProfesor');
    Route::post('agregando-profesor', [PlataformaController::class, 'agregandoProfesor'])->name('agregando-profesor');
    Route::get('area-personal/cuentas/agregar-alumno', [PlataformaController::class, 'agregarAlumno'])->name('area-personal.cuentas.agregarAlumno');
    Route::post('agregando-alumno', [PlataformaController::class, 'agregandoAlumno'])->name('agregando-alumno');
    Route::get('area-personal/cuentas/eliminar-cuenta', [PlataformaController::class, 'eliminarCuenta'])->name('area-personal.cuentas.eliminarCuenta');
    Route::delete('eliminando-cuenta', [PlataformaController::class, 'eliminandoCuenta'])->name('eliminando-cuenta');


    Route::get('area-personal/{curso}', [PlataformaController::class, 'curso'])->name('curso');
    Route::get('area-personal/{curso}/editar', [PlataformaController::class, 'editarCurso'])->name('area-personal.editarCurso');
    Route::put('editando-curso/{curso}', [PlataformaController::class, 'editandoCurso'])->name('editando-curso');
    Route::delete('eliminando-curso/{curso}', [PlataformaController::class, 'eliminandoCurso'])->name('eliminando-curso');


    Route::get('area-personal/{curso}/crear-test', [PlataformaController::class, 'crearTest'])->name('curso.crear-test');
    Route::post('creando-test/{curso}/{test}', [PlataformaController::class, 'creandoTest'])->name('creando-test');
    Route::get('area-personal/{curso}/{modulo}/{test}', [PlataformaController::class, 'test'])->name('test');
    Route::post('enviando-respuestas-test/{curso}/{modulo}/{test}', [PlataformaController::class, 'enviandoRespuestasTest'])->name('enviando-respuestas-test');
    Route::delete('eliminando-test/{curso}/{test}', [PlataformaController::class, 'eliminandoTest'])->name('eliminando-test');


    Route::get('area-personal/{curso}/agregar-modulo', [PlataformaController::class, 'agregarModulo'])->name('agregar-modulo');
    Route::post('agregando-modulo/{curso}', [PlataformaController::class, 'agregandoModulo'])->name('agregando-modulo');
    Route::get('area-personal/{curso}/{modulo}', [PlataformaController::class, 'modulo'])->name('modulo');
    Route::get('area-personal/{curso}/{modulo}/editar', [PlataformaController::class, 'editarModulo'])->name('area-personal.editarModulo');
    Route::put('editando-modulo/{curso}/{modulo}', [PlataformaController::class, 'editandoModulo'])->name('editando-modulo');
    Route::delete('eliminando-modulo/{curso}/{modulo}', [PlataformaController::class , 'eliminandoModulo'])->name('eliminando-modulo');
    Route::post('agregando-pdf-alumno/{curso}/{modulo}', [PlataformaController::class, 'agregandoPdfModulo'])->name('agregandoPdfModulo');
    Route::delete('eliminando-pdf-modulo/{curso}/{pdf}', [PlataformaController::class,'eliminandoPdfModulo'])->name('eliminandoPdfModulo');




    // Desde aqui para abajo son las rutas complementarias de los usuarios que sean alumnos

    Route::get('mis-archivos', [PAlumnoController::class, 'misArchivos'])->name('mis-archivos');
    


});
