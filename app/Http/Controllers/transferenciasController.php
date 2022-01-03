<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asegurado;
use App\Models\Certificado;
use App\Models\Transferencia;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;


class transferenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuario = Auth::user();
        $role = $usuario->role;
        $user = $usuario->name;


            if($role == 'Admin'){

                $transferencias = DB::table('transferencias')
                ->join('certificados','transferencias.id','=','certificados.id_transferencia')
                ->groupBy('id_transferencia')
                ->get();
                
                return view('admin.AllTransferencia')->with('transferencias',$transferencias);

            }else{

                $transferencias = DB::table('transferencias')
                ->join('certificados','transferencias.id','=','certificados.id_transferencia')
                ->where('user','=',$user)
                ->groupBy('id_transferencia')
                ->get();
                
                return view('formularios.userAllTransferencia')->with('transferencias',$transferencias);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function create()
    {
        $certificadosAFacturar = DB::table('certificados')->where('id_transferencia','=', null)->orderBy('user')->get();

        return view('admin.createTransferencia')->with('certificados',$certificadosAFacturar)->with('alerta','no');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $certificadosAFacturar = DB::table('certificados')->where('id_transferencia','=', null)->orderBy('user')->get();
        
        $user = $certificadosAFacturar[0]->user;
        $transferencias = array();
        $montoAcumulado = 0;
        $idsCertificado = array();

        foreach($certificadosAFacturar as $certificado){

            
            
            if($certificado->user != $user){
                $user=$certificado->user;
                $fecha = date('Y-m-d');
                
                //llamar funcion que guarde transferencia guardar_transferencia($transferencia)

                $transferencia = new Transferencia();
                $transferencia->fecha = $fecha;
                $transferencia->monto = $montoAcumulado *0.8;
                $transferencia->tipo_cambio_usd = '871';
                $transferencia->save();
                

                $data = transferencia::latest('id')->first();
                $id_tr = $data->id;
                echo $id_tr;
                // actualizar tabla certificado con transferencia_id
                foreach($idsCertificado as $idCertificado){
                    Certificado::where('id', $idCertificado)->update(['id_transferencia'=>$id_tr]);
                }
                

                // limpiar array transferencia

                unset($transferencias);
                unset($idsCertificado);
                $montoAcumulado = 0;

            }

            $montoAcumulado = $montoAcumulado + $certificado->costo;
            $transferencias[] = $certificado; 
            $idsCertificado[] = $certificado->id;

          

        }
        //Guarta la ultima Transferencia.
        $fecha = date('Y-m-d');
                
        $transferencia = new Transferencia();
        $transferencia->fecha = $fecha;
        $transferencia->monto = $montoAcumulado *0.8;
        $transferencia->tipo_cambio_usd = '871';
        $transferencia->save();

        $data = transferencia::latest('id')->first();
        $id_tr = $data->id;
        // actualizar tabla certificado con transferencia_id
        foreach($idsCertificado as $idCertificado){
            Certificado::where('id', $idCertificado)->update(['id_transferencia'=>$id_tr]);
        }
        
        $certificadosPendientes = DB::table('certificados')->where('id_transferencia','=', null)->orderBy('user')->get();
        $alerta = 'si';

        return view('admin.createTransferencia')->with('certificados',$certificadosPendientes)->with('alerta',$alerta);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Auth::user();
        $role = $usuario->role;
        $user = $usuario->name;

    
        $certificados = DB::table('certificados')
        ->where('id_transferencia','=',$id)
        ->get();
        
        return view('formularios.verTransferencia')->with('certificados',$certificados)->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transferencias = DB::table('transferencias')
        ->join('certificados','transferencias.id','=','certificados.id_transferencia')
        ->where('transferencias.id','=',$id)
        ->groupBy('id_transferencia')
        ->get();
        

        $certificados = DB::table('certificados')
        ->where('id_transferencia','=',$id)
        ->get();
        
        return view('admin.verTransferencia')->with('transferencias',$transferencias[0])->with('certificados',$certificados)->with('id',$id);
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
        foreach($request->get('estado') as $estado);

        $transferencias = Transferencia::find($id);
        $transferencias->estado = $estado;
        $transferencias->save();

        $transferencias = DB::table('transferencias')
        ->join('certificados','transferencias.id','=','certificados.id_transferencia')
        ->groupBy('id_transferencia')
        ->get();
        
        return view('admin.AllTransferencia')->with('transferencias',$transferencias);


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
