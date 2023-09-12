<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgregandoModulo;
use App\Http\Requests\AgregandoPdfModulo;
use App\Http\Requests\AgregandoProfesor;
use App\Http\Requests\CambiandoContrasenaRequest;
use Illuminate\Support\Str;
use App\Http\Requests\CreandoCurso;
use App\Http\Requests\CreandoTest;
use App\Http\Requests\DesvinculandoProfesor;
use App\Http\Requests\EditandoImg;
use App\Http\Requests\EditandoModulo;
use App\Http\Requests\EditandoPerfil;
use App\Http\Requests\EliminandoCuenta;
use App\Http\Requests\EliminandoInscripcion;
use App\Http\Requests\EnviandoRespuestasTest;
use App\Http\Requests\InscribiendoAlumno;
use App\Http\Requests\Login;
use App\Http\Requests\VinculandoProfesor;
use App\Models\Cursos;
use App\Models\InfoUsuarios;
use App\Models\Inscripciones;
use App\Models\Modulos;
use App\Models\PdfsModulos;
use App\Models\PreguntasTest;
use App\Models\RespuestasTest;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\Return_;

class RemplazarInscripcion {
    public $identificacion;

    public function __construct($identificacion)
    {
        $this->identificacion = $identificacion;
    }
}
class RemplazarPreguntasTest {
    public $pregunta;
    public $respuesta_uno;
    public $respuesta_dos;
    public $respuesta_tres;

    public function __construct($pregunta,$respuesta_uno,$respuesta_dos,$respuesta_tres)
    {
        $this->pregunta = $pregunta;
        $this->respuesta_uno = $respuesta_uno;
        $this->respuesta_dos = $respuesta_dos;
        $this->respuesta_tres = $respuesta_tres;
    }

}


class PlataformaController extends Controller
{
    public function login(Login $request){

        $usuario = User::where('correo', $request->correo)->first();

        // return $usuario->contrasena.' -  '.bcrypt($request->contrasena);

        if($usuario->contrasena === md5($request->contrasena)){
            Auth::login($usuario);
            request()->session()->regenerate();
            return redirect()->route('area-personal');
        }

        throw ValidationException::withMessages([
            'correo' => 'Estas credenciales no coinciden con nuestros registros'
        ]);
        
    }
    public function cerrarSesion(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('index');
    }


    public function areaPersonal(){
        // $cursos = Cursos::all();
        $cursos = Cursos::leftjoin('usuarios','cursos.identificacion', '=','usuarios.identificacion')->select('cursos.*','usuarios.nombre as nombre')->get();
        return view('profesor.areaPersonal', compact('cursos'));
    }
    public function administrar(){
        return view('profesor.administrar');
    }
    public function crearCurso(){
        return view('formularios.crearCurso');
    }
    public function creandoCurso(CreandoCurso $request){
        $creandoCurso = new Cursos();
        $creandoCurso->nombre_curso = $request->nombre_curso;
        $creandoCurso->slug = Str::slug($request->nombre_curso,'-');
        $creandoCurso->descripcion = $request->descripcion;
        $creandoCurso->save();

        return redirect()->route('administrar')->with('alert','Curso creado correctamente');
    }
    public function vincularProfesor(){
        return view('formularios.vincularProfesor');
    }
    public function vinculandoProfesor(VinculandoProfesor $request){
        $buscarVinculacion = Cursos::where('identificacion','=',$request->identificacion)->where('id_cursos','=',$request->id_cursos)->count();

        $buscarCedula = User::where('identificacion',$request->identificacion)->get();
        $buscarCurso = Cursos::where('id_cursos',$request->id_cursos)->get();

        if(count($buscarCedula) === 0){
            return redirect()->route('administrar.vincular-profesor')->with('alert',"La cedula no existe");
        }
        if(count($buscarCurso) === 0){
            return redirect()->route('administrar.vincular-profesor')->with("alert", "El curso no existe");
        }
        
        if($buscarVinculacion >0){
            return redirect()->route('area-personal.administrar')->with('alert', 'Ya existe una vinculacion, desvincula primero para poder hacer una nueva vinculacion');
        }else {
            $curso = Cursos::find($request->id_cursos);
            $curso->identificacion = $request->identificacion;
            $curso->update();
            return redirect()->route('administrar')->with('alert','Vinculacion creada');
        }
    }
    public function desvincularProfesor(){
        return view('formularios.desvincularProfesor');
    }
    public function desvinculandoProfesor(DesvinculandoProfesor $request){
        $buscarVinculacion = Cursos::where('identificacion','=',$request->identificacion)->where('id_cursos','=',$request->id_curso)->count();

        $buscarCedula = User::where('identificacion',$request->identificacion)->get();
        $buscarCurso = Cursos::where('id_cursos',$request->id_curso)->get();

        if(count($buscarCedula) === 0){
            return redirect()->route('administrar.desvincular-profesor')->with('alert',"La cedula no existe");
        }
        if(count($buscarCurso) === 0){
            return redirect()->route('administrar.desvincular-profesor')->with("alert", "El curso no existe");
        }

        if($buscarVinculacion > 0){
            $curso = Cursos::find($request->id_curso);
            $curso->identificacion = null;
            $curso->update();
            return redirect()->route('administrar')->with('alert','Profesor desvinculado exitosamente.');
        }else {
            return redirect()->route('administrar.desvincular-profesor')->with('alert','No existe vinculacion para eliminar.');
        }
    }
    public function inscribirAlumno(){
        return view('formularios.inscribirAlumno');
    }
    public function inscribiendoAlumno(InscribiendoAlumno $request){
        $buscarInscripcion = Inscripciones::where('identificacion','=',$request->identificacion)->where('id_cursos','=',$request->id_curso)->count();

        $buscarIdentificacion = User::where('identificacion',$request->identificacion)->get();
        $buscarCurso = Cursos::where('id_cursos',$request->id_curso)->get();

        if(count($buscarIdentificacion) === 0){
            return redirect()->route('administrar.inscribirAlumno')->with('alert',"La identificacion no existe");
        }
        if(count($buscarCurso) === 0){
            return redirect()->route('administrar.inscribirAlumno')->with("alert", "El curso no existe");
        }

        if($buscarInscripcion > 0){
            return redirect()->route('administrar.inscribirAlumno')->with('alert','El alumno ya esta inscrito a ese curso.');
        }else {
            $inscripcion = new Inscripciones();
            $inscripcion->estado = 1;
            $inscripcion->identificacion = $request->identificacion;
            $inscripcion->id_cursos = $request->id_curso;
            $inscripcion->save();

            return redirect()->route('administrar')->with('alert','Inscripcion exitosa.');
        }
    }
    public function eliminarInscripcion(){
        return view('formularios.eliminarInscripcion');
    }
    public function eliminandoInscripcion(EliminandoInscripcion $request){
        $buscarInscripcion = Inscripciones::where('identificacion','=',$request->identificacion)->where('id_cursos','=',$request->id_curso)->count();

        $buscarIdentificacion = User::where('identificacion',$request->identificacion)->get();
        $buscarCurso = Cursos::where('id_cursos',$request->id_curso)->get();

        if(count($buscarIdentificacion) === 0){
            return redirect()->route('administrar.eliminarInscripcion')->with('alert',"La identificacion no existe");
        }
        if(count($buscarCurso) === 0){
            return redirect()->route('administrar.eliminarInscripcion')->with("alert", "El curso no existe");
        }


        if($buscarInscripcion > 0){
            $inscripcion = Inscripciones::where('identificacion','=',$request->identificacion)->where('id_cursos','=',$request->id_curso)->get();
            $inscripcion[0]->delete();
            return redirect()->route('administrar')->with('alert','Inscripcion eliminada.');
        }else {
            return redirect()->route('administrar.eliminarInscripcion')->with('alert','No existe inscripcion con esos datos ingresados.');
        }
    }

    public function misCursos(){
        $cursos = Cursos::where('identificacion','=', Auth::user()->identificacion)->get();
        $cursosAlumnos = Cursos::leftjoin('inscripciones','cursos.id_cursos', '=','inscripciones.id_cursos')->select('cursos.*','inscripciones.estado as estado')->where('inscripciones.identificacion', '=',Auth::user()->identificacion)->get();
        return view('profesor.misCursos', compact('cursos', 'cursosAlumnos'));
    }
    public function notas(){
        return view('profesor.notas');
    }


    public function configuracion(){
        return view('profesor.configuracion');
    }
    public function cambiarContrasena(){
        return view('formularios.cambiarContrasena');
    }
    public function cambiandoContrasena(CambiandoContrasenaRequest $request){
        
        if(Auth::user()->contrasena === md5($request->contrasena)){
            $cambioContrasena = User::where('contrasena','=',Auth::user()->contrasena)->where('correo','=',Auth::user()->correo)->first();
            $cambioContrasena->contrasena = md5($request->contrasena_nueva);
            $cambioContrasena->update();
            return redirect()->route('area-personal.configuracion')->with('alert','Contraseña actualizada');
        }

        throw ValidationException::withMessages([
            'contrasena' => "La contraseña es incorrecta"
        ]);
    }


    public function perfil(){
        $infoUsuario = InfoUsuarios::leftjoin('usuarios', 'info_usuarios.identificacion','=','usuarios.identificacion')->select('info_usuarios.*', 'usuarios.*')->where('usuarios.identificacion','=',Auth::user()->identificacion)->get();
        return view('profesor.perfil', ['infoUsuario' => $infoUsuario[0]]);
    }
    public function editarPerfil(){
        $infoUsuario = InfoUsuarios::leftjoin('usuarios', 'info_usuarios.identificacion','=','usuarios.identificacion')->select('info_usuarios.*', 'usuarios.*')->get();
        return view('formularios.editarPerfil', ['infoUsuario' => $infoUsuario[0]]);
    }
    public function editandoPerfil(EditandoPerfil $request){
        $usuario = User::find(Auth::user()->identificacion);
        $infoUsuario = InfoUsuarios::where('identificacion','=',$usuario->identificacion)->get();
        $infoUsuario[0]->telefono =  $request->telefono;
        $infoUsuario[0]->celular = $request->celular;
        $infoUsuario[0]->direccion = $request->direccion;
        $infoUsuario[0]->update();
        return redirect()->route('area-personal.perfil')->with('alert', 'Datos actualizados');
    }
    public function editandoImg(EditandoImg $request){
        if($request->hasFile('imgPerfil')){
            $path = "imgPerfilProfesor/";

            $nombre = Str::slug($request->file('imgPerfil')->getClientOriginalName()).'.'.trim($request->file('imgPerfil')->getClientOriginalExtension());
            $request->imgPerfil->storeAs($path,$nombre,'public');

            $usuario = User::find(Auth::user()->identificacion);
            $usuario->img_url = "/app-web/storage/app/public/".$path.$nombre;
            $usuario->update();
            return redirect()->route('area-personal.perfil')->with('alert','Imagen de perfil ha sido actualizada');
        }
    }


    public function cuentas(){
        return view('profesor.cuentas');
    }
    public function agregarProfesor(){
        return view('formularios.agregarProfesor');
    }
    public function agregandoProfesor(AgregandoProfesor $request){
        $profesor = new User();
        $profesor->identificacion = $request->identificacion;
        $profesor->nombre = $request->nombre;
        $profesor->correo = $request->correo;
        $profesor->contrasena = md5($request->contrasena);
        $profesor->rol = $request->rol;
        $profesor->admin = $request->admin;
        $profesor->save();

        $infoProfe = new InfoUsuarios();
        $infoProfe->identificacion = $request->identificacion;
        $infoProfe->save();
        return redirect()->route('area-personal.cuentas')->with('alert','La cuenta de profesor fue creada.');
    }
    public function agregarAlumno(){
        return view('formularios.agregarAlumno');
    }
    public function agregandoAlumno(AgregandoProfesor $request){
        $alumno = new User();
        $alumno->identificacion = $request->identificacion;
        $alumno->nombre = $request->nombre;
        $alumno->correo = $request->correo;
        $alumno->contrasena = md5($request->contrasena);
        $alumno->rol = $request->rol;
        $alumno->save();

        $infoProfe = new InfoUsuarios();
        $infoProfe->identificacion = $request->identificacion;
        $infoProfe->save();


        return redirect()->route('area-personal.cuentas')->with('alert','La cuenta de alumno fue creada.');
    }
    public function eliminarCuenta(){
        return view('formularios.eliminarCuenta');
    }
    public function eliminandoCuenta(EliminandoCuenta $request){
        $cuenta = User::where('correo', '=',$request->correo)->get();

        if(count($cuenta) > 0){
            $cuenta[0]->delete();
            return redirect()->route('area-personal.cuentas')->with('alert','Cuenta eliminada.');
        }else {
            return redirect()->route('area-personal.cuentas.eliminarCuenta')->with('alert','No existe la cuenta con este correo');
        }  
    }


    public function curso($curso){
        $buscarCurso = Cursos::where('slug','=',$curso)->get();

        $buscarTest = Test::where('id_cursos','=', $buscarCurso[0]->id_cursos)->get();


        $buscarModulos = Modulos::where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();

        $inscripcionAlumno =  Inscripciones::where('identificacion','=',Auth::user()->identificacion)->where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();
        if(count($inscripcionAlumno) == 0){

            $objeto =  new RemplazarInscripcion(0);
            $inscripcionAlumno = [$objeto];
            
        }

        return view('profesor.cursos.curso',compact('buscarCurso','buscarModulos','buscarTest','inscripcionAlumno'));
    }
    public function editarCurso($curso){
        $buscarCurso = Cursos::where('slug', '=',$curso)->get();
        return view('formularios.editarCurso', compact('buscarCurso'));
    }
    public function editandoCurso(CreandoCurso $request, $curso){
        $editandoCurso = Cursos::where('slug','=',$curso)->get();
        $editandoCurso[0]->nombre_curso = $request->nombre_curso;
        $editandoCurso[0]->descripcion = $request->descripcion;
        $editandoCurso[0]->update();

        return redirect()->route('area-personal')->with('alert','Curso actualizado.');
    }
    public function eliminandoCurso($curso){
        $curso =  Cursos::where('slug','=',$curso)->get();
        $curso[0]->delete();
        return redirect()->route('area-personal')->with('alert','Curso eliminado');
    }

    public function crearTest($curso){
        $buscarCurso = Cursos::where('slug','=',$curso)->get();
        $buscarTest = Test::where('id_cursos','=', $buscarCurso[0]->id_cursos)->get();

        if(count($buscarTest) == 0){
            $buscarTest[0] = new Test();
            $buscarTest[0]->nombre_test = $buscarCurso[0]->nombre_curso;
            $buscarTest[0]->slug = Str::slug($buscarCurso[0]->nombre_curso,'-');
            $buscarTest[0]->id_cursos = $buscarCurso[0]->id_cursos;
            $buscarTest[0]->save();
            return view('formularios.formTest', compact('buscarCurso', 'buscarTest'));
        }

        return view('formularios.formTest', compact('buscarCurso', 'buscarTest'));
    }
    public function creandoTest(CreandoTest $request, $curso, $test){
        $buscarCurso = Cursos::where('slug', '=',$curso)->first();

        $preguntas = [$request->preguntaUno, $request->preguntaDos, $request->preguntaTres, $request->preguntaCuatro, $request->preguntaCinco];
        $respuestasCorrectas = [$request->PCorrectaUno,$request->PCorrectaDos,$request->PCorrectaTres,$request->PCorrectaCuatro,$request->PCorrectaCinco];

        $respuestasTotal = [$request->P1RespuestaUno,$request->P1RespuestaDos,$request->P1RespuestaTres,$request->P2RespuestaUno,$request->P2RespuestaDos,$request->P2RespuestaTres,$request->P3RespuestaUno,$request->P3RespuestaDos,$request->P3RespuestaTres,$request->P4RespuestaUno,$request->P4RespuestaDos,$request->P4RespuestaTres,$request->P5RespuestaUno,$request->P5RespuestaDos,$request->P5RespuestaTres];


        $x = 0;
        for ($i=0; $i < 5; $i++) { 
            $preguntasTest = new PreguntasTest();
            $preguntasTest->pregunta = $preguntas[$i];
            $preguntasTest->respuesta_uno = $respuestasTotal[$x];
            $preguntasTest->respuesta_dos = $respuestasTotal[$x+1];
            $preguntasTest->respuesta_tres = $respuestasTotal[$x+2];
            $preguntasTest->correcta = $respuestasCorrectas[$i];
            $preguntasTest->id_test = $test;
            $preguntasTest->save();
            
            $x+=3;
        }

        return redirect()->route('curso', $curso)->with('alert', 'El test ha sido agregado');
    }
    public function test($curso,$modulo,$test){
        $buscarCurso = Cursos::where('slug', '=', $curso)->get();
        $buscarModulo = Modulos::where('id_cursos','=',$buscarCurso[0]->id_cursos)->where('slug','=',$modulo)->get();
        $modulos = Modulos::where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();
        $pdfsModulos = PdfsModulos::where('id_modulos','=',$buscarModulo[0]->id_modulos)->get();

        $buscarTest = Test::where('slug','=',$test)->where('id_cursos','=', $buscarCurso[0]->id_cursos)->get();
        $inscripcionAlumno =  Inscripciones::where('identificacion','=',Auth::user()->identificacion)->where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();
        if(count($inscripcionAlumno) == 0){

            $objeto =  new RemplazarInscripcion(0);
            $inscripcionAlumno = [$objeto];
            
        }

        $preguntasTest = PreguntasTest::where('id_test','=',$buscarTest[0]->id_test)->get();

        if(count($preguntasTest) == 0){
            $preguntasTest = [];
            for ($i=0; $i < 5; $i++) { 
                $objeto = new RemplazarPreguntasTest("Sin pregunta","Sin respuesta","Sin respuesta","Sin respuesta");
                $preguntasTest[] = $objeto;
            }
        }
        return view('profesor.cursos.test', compact('buscarCurso','buscarModulo','modulos','pdfsModulos','buscarTest','preguntasTest','inscripcionAlumno'));
    }
    public function enviandoRespuestasTest(EnviandoRespuestasTest $request,$curso,$modulo,$test){
        //Completar lo que falta, y para que no vuelvan a repetir el test cambiamos la columna "test_enviado" en la tabla notas_alumno
        return $request;
    }
    public function eliminandoTest($curso,$test){
        $buscarCurso = Cursos::where('slug','=',$curso)->get();
        $buscarTest = Test::where('slug','=',$test)->where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();
        $buscarTest[0]->delete();
        return redirect()->route('curso', $buscarCurso[0])->with('alert','Test eliminado');
    }



    public function agregarModulo($curso){
        return view('formularios.agregarModulo', compact('curso'));
    }
    public function agregandoModulo(AgregandoModulo $request, $curso){
        $buscarCurso = Cursos::where('slug','=',$curso)->get();

        if($request->hasFile('video')){
            $path = "videosModulos/";

            $nombre = Str::slug($request->file('video')->getClientOriginalName()).'.'.trim($request->file('video')->getClientOriginalExtension());
            $request->video->storeAs($path,$nombre,'public');

            $nuevoModulo =  new Modulos();
            $nuevoModulo->nombre_modulo = $request->nombre_modulo;
            $nuevoModulo->slug = Str::slug($request->nombre_modulo,'-');
            $nuevoModulo->url_video = "/app-web/storage/app/public/".$path.$nombre;
            $nuevoModulo->desc_modulo = $request->desc_modulo;
            $nuevoModulo->id_cursos = $buscarCurso[0]->id_cursos;
            $nuevoModulo->save();

            return redirect()->route('curso',$curso)->with('alert', 'Modulo agregado');
            
        }
    }
    public function modulo($curso,$modulo){
        $buscarCurso = Cursos::where('slug', '=', $curso)->get();
        $buscarModulo = Modulos::where('id_cursos','=',$buscarCurso[0]->id_cursos)->where('slug','=',$modulo)->get();
        $modulos = Modulos::where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();
        $pdfsModulos = PdfsModulos::where('id_modulos','=',$buscarModulo[0]->id_modulos)->get();

        $inscripcionAlumno =  Inscripciones::where('identificacion','=',Auth::user()->identificacion)->where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();
        if(count($inscripcionAlumno) == 0){

            $objeto =  new RemplazarInscripcion(0);
            $inscripcionAlumno = [$objeto];
            
        }

        $buscarTest = Test::where('id_cursos','=', $buscarCurso[0]->id_cursos)->get();
        return view('profesor.cursos.modulo', compact('buscarCurso','buscarModulo','modulos','pdfsModulos','buscarTest','inscripcionAlumno'));
    }
    public function editarModulo($curso,$modulo){
        $buscarCurso = Cursos::where('slug','=',$curso)->get();
        $buscarModulo = Modulos::where('slug','=',$modulo)->get();
        return view('formularios.editarModulo', compact('buscarCurso','buscarModulo'));
    }
    public function editandoModulo(EditandoModulo $request, $curso, $modulo){
        $buscarCurso = Cursos::where('slug','=',$curso)->get();
        if($request->hasFile('video')){
            $path = "videosModulos/";

            $nombre = Str::slug($request->file('video')->getClientOriginalName()).'.'.trim($request->file('video')->getClientOriginalExtension());
            $request->video->storeAs($path,$nombre, 'public');

            $editandoModulo = Modulos::where('slug','=',$modulo)->where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();
            $editandoModulo[0]->nombre_modulo = $request->nombre_modulo;
            $editandoModulo[0]->slug = Str::slug($request->nombre_modulo,'-');
            $editandoModulo[0]->url_video = "/app-web/storage/app/public/".$path.$nombre;
            $editandoModulo[0]->desc_modulo = $request->desc_modulo;
            $editandoModulo[0]->update();


            return redirect()->route('curso',$curso)->with('alert','Modulo editado');
        }else {

            $editandoModulo = Modulos::where('slug','=',$modulo)->where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();
            $editandoModulo[0]->nombre_modulo = $request->nombre_modulo;
            $editandoModulo[0]->slug = Str::slug($request->nombre_modulo,'-');
            $editandoModulo[0]->desc_modulo = $request->desc_modulo;
            $editandoModulo[0]->update();

            return redirect()->route('curso',$curso)->with('alert','Modulo editado');
        }
    }
    public function eliminandoModulo($curso,$modulo){
        $buscarCurso = Cursos::where('slug','=',$curso)->get();
        $buscarModulo = Modulos::where('slug','=',$modulo)->where('id_cursos','=',$buscarCurso[0]->id_cursos)->get();
        $buscarModulo[0]->delete();
        return redirect()->route('curso',['curso' => $buscarCurso[0]])->with('alert','Modulo eliminado');
    }
    public function agregandoPdfModulo(AgregandoPdfModulo $request, $curso,$modulo){
        $buscarModulo = Modulos::where('slug','=',$modulo)->get();
        if($request->hasFile('pdf_modulo')){
            $path = "pdfsModulos/";

            $nombre = Str::slug($request->file('pdf_modulo')->getClientOriginalName()).'.'.trim($request->file('pdf_modulo')->getClientOriginalExtension());
            $request->pdf_modulo->storeAs($path,$nombre,'public');

            $agregarPdf = new PdfsModulos();
            $agregarPdf->nombre_pdf = $nombre;
            $agregarPdf->url_pdf = "/app-web/storage/app/public/".$path.$nombre;
            $agregarPdf->id_modulos = $buscarModulo[0]->id_modulos;
            $agregarPdf->save();

            return redirect()->route('curso', $curso)->with('alert','Pdf agregado');
        }

    }
    public function eliminandoPdfModulo($curso,PdfsModulos $pdf){
        $pdf->delete();
        return redirect()->route('curso',$curso)->with('alert','Pdf eliminado');
    }
}
