<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    
    $usuario = Auth::user();
    $user = $usuario->name;
    $role = $usuario->role;

    if($role == 'Admin'){

        $qcertificado =  DB::table('certificados')->join('asegurados','asegurados.id_certificado','=','certificados.id')->groupBy('asegurados.id_certificado')->get();
   
        return view('admin.home')->with('certficados',$qcertificado)->with('user',$usuario);

    }else{

        $qcertificado =  DB::table('certificados')->join('asegurados','asegurados.id_certificado','=','certificados.id')->where('certificados.user','=',$user)->groupBy('asegurados.id_certificado')->get();
   
        return view('home')->with('certficados',$qcertificado)->with('user',$usuario);

    }
    
    

})->middleware('auth');

Route::resource('certificado', 'App\Http\Controllers\CertificadoController');
Route::resource('transferencias', 'App\Http\Controllers\transferenciasController');
Route::resource('usuarios', 'App\Http\Controllers\userController');


