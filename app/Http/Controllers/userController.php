<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Certificado;
use App\Models\Transferencia;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = db::table('users')->get();
        $alerta = 'no';


        return view('admin.verUsers')->with('users',$usuarios)->with('alerta',$alerta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qu = db::table('users')->where('id',$id)->get();
        $user = $qu[0];
     
        
        $transferencias = DB::table('transferencias')
                ->join('certificados','transferencias.id','=','certificados.id_transferencia')
                ->where('user','=',$user->name)
                ->groupBy('id_transferencia')
                ->get();


        return view('admin.editUser')->with('user',$user)->with('transferencias',$transferencias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        foreach($request->get('role') as $role);
        foreach($request->get('activo') as $activo); 
        
        $user = User::find($id);
        $user->role = $role;  
        $user->activo = $activo;
        $user->save();

        $usuarios = db::table('users')->get();
        $alerta = 'si';

        return view('admin.verUsers')->with('users',$usuarios)->with('alerta',$alerta);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
