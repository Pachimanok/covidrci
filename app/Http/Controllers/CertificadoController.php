<?php

namespace App\Http\Controllers;

use App\Models\Asegurado;
use App\Models\Certificado;
use App\Models\variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;



class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $usuario = Auth::user();
        $user = $usuario->name;

        return view('formularios.createCertificado')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $usuario = Auth::user();
            $user = $usuario->name;

            // +++++++++++ Generar certificado Madre +++++++++++ //
            
            // Para generar Madre Necesitamos ID de asegurado.
            foreach($request->get('asegurado_ultimaosDias') as $asegurado_ultimaosDias);
            foreach($request->get('asegurado_contactoEstrecho') as $asegurado_contactoEstrecho);
            foreach($request->get('asegurado_sintomas') as $asegurado_sintomas);

            $asegurado = new Asegurado();
            $asegurado->nombre = $request->get('tomador_nombre');
            $asegurado->domicilio = $request->get('tomador_domicilio');
            $asegurado->localidad = $request->get('tomador_localidad');
            $asegurado->pais = $request->get('tomador_pais');
            $asegurado->doc_tipo = 'rut';
            $asegurado->doc_numero = $request->get('tomador_rut');
            $asegurado->orden = '1';
            $asegurado->peso = $request->get('asegurado_peso');
            $asegurado->altura = $request->get('asegurado_altura');  
            $asegurado->toma_medicamento = $request->get('asegurado_medicamentos');
            $asegurado->pcr = $request->get('asegurado_pcr');
            $asegurado->cual_medicamento = $request->get('asegurado_medicamento_detalle');
            $asegurado->sintomas = $asegurado_sintomas;
            $asegurado->cual_sintoma = $request->get('asegurado_sintomas_detalle');
            $asegurado->expuesto = $asegurado_ultimaosDias;
            $asegurado->cual_expuesto = $request->get('asegurado_ultimosDias_detalle');
            $asegurado->contacto = $asegurado_contactoEstrecho;
            $asegurado->cual_contacto= $request->get('asegurado_contactoEstrecho_detalle');
            $asegurado->user= $user;
            $asegurado->save();

            $data = Asegurado::latest('id')->first();
            $id_as = $data->id;

            // Generamos certificado Madre.

            $certificados = new Certificado();
            $certificados->fecha_emision = $request->get('fecha_inicio');
            $certificados->fecha_final = $request->get('fecha_final');
            $certificados->id_asegurado = $id_as;
            $certificados->user = $user;
            $certificados->save();

            $data = Certificado::latest('id')->first();
            $id_cer = $data->id;
            // asignamos certificado al asegurado

            $aseguradoId = Asegurado::find($id_as);
            $aseguradoId->id_certificado = $id_cer;
            $aseguradoId->save();
           
            // si hay agregados cargamos en asegurados 
            $nombre = $request->get('nombre');
            
            if($nombre !== null){
                $nombre = $request->get('nombre');
                $rut = $request->get('rut');
                $altura = $request->get('altura');
                $peso = $request->get('peso');
                $toma_medicamento = $request->get('medicamentos');
                $pcr = $request->get('pcr');
                $cual_medicamento = $request->get('medicamento_detalle');
                $sintomas = $request->get('sintomas');
                $cual_sintoma = $request->get('sintomas_detalle');
                $expuesto = $request->get('ultimosDias');
                $cual_expuesto = $request->get('ultimosDias_detalle');
                $contacto = $request->get('contactoEstrecho');
                $cual_contacto= $request->get('contactoEstrecho_detalle');
            
                //recorremos y vamos insertando los datos en la tabla.
              
                for ($i = 0; $i < count($nombre); $i++) {
                
                    $acompanante = new Asegurado();
                    $acompanante->nombre = $nombre[$i];
                    $acompanante->doc_tipo = 'rut';
                    $acompanante->doc_numero = $rut[$i];
                    $acompanante->orden = '2';
                    $acompanante->peso = $peso[$i];
                    $acompanante->altura = $altura[$i];  
                    $acompanante->toma_medicamento = $toma_medicamento[$i];
                /*  $acompanante->pcr = $pcr[$i]; */
                    $acompanante->cual_medicamento = $cual_medicamento[$i];
                    $acompanante->sintomas = $sintomas[$i];
                    $acompanante->cual_sintoma = $cual_sintoma[$i];
                    $acompanante->expuesto = $expuesto[$i];
                    $acompanante->cual_expuesto = $cual_expuesto[$i];
                    $acompanante->contacto = $contacto[$i];
                    $acompanante->cual_contacto= $cual_contacto[$i];
                    $acompanante->id_certificado = $id_cer;
                    $acompanante->user= $user;
                    $acompanante->save();
                }
            }

        
        $aseguradosReview = DB::table('asegurados')->join('certificados','asegurados.id_certificado','=','certificados.id')->where('certificados.id','=',$id_cer)->get();
       
        // variables;
        $variables = DB::table('variables')->get();
        $montoBase = $variables[0]->monto;
        $montoDia = $variables[1]->monto;

        
        // Costo del Seguro
        $cantidadPers = $aseguradosReview->count();
        $datetime1 = date_create($aseguradosReview[0]->fecha_final);
        $datetime2 = date_create($aseguradosReview[0]->fecha_emision);
       
        $diff = $datetime2->diff($datetime1)->format('%a');
        $base =  $montoBase; // 6 usd.
        $diasDeMas = $diff - 5; // días que se pagan aparte

        if($diasDeMas > 0 ){

            $diasDeMasUsd =  $diasDeMas * $montoDia; // 1usd.
            $subtotal = $base + $diasDeMasUsd; // por Persona;
            
            $total = $cantidadPers * $subtotal; // todos
           

            $costo = Certificado::find($id_cer);
            $costo->costo = $total;
            $costo->save();

        }else{
            
        $total = $base;
        $costo = Certificado::find($id_cer);
        $costo->costo = $total;
        $costo->save();

        }
        
        $fecha_emision = $request->get('fecha_inicio');
        $fecha_final = $request->get('fecha_final');
        return view('formularios.confirmarCertificado')
        ->with('asegurados',$aseguradosReview)
        ->with('id_cer',$id_cer)
        ->with('pagar',$total)
        ->with('fecha_emision',$fecha_emision)
        ->with('fecha_final',$fecha_final);

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
        //
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

    /*     $certificado = Certificado::find($id); */
        
        $qcertificado =  DB::table('asegurados')->join('certificados','asegurados.id_certificado','=','certificados.id')->where('certificados.id','=',$id)->where('asegurados.orden','=','1')->get();
        $certificado = $qcertificado[0];
      
        $asegurados = DB::table('asegurados')->join('certificados','asegurados.id_certificado','=','certificados.id')->where('certificados.id','=',$id)->where('asegurados.orden','=','2')->get();
       /*  dd($asegurados[0]);  */
        $data = [
            'titulo' => 'Styde.net',
            'hoy' => Carbon::now()->format('d/m/Y'),
            'poliza' => 'BOCHA89',
            'tomador' => $certificado->nombre,
            'rut' => $certificado->doc_numero,
            'domicilio' => $certificado->domicilio,
            'localidad' => $certificado->localidad,
            'pais' => $certificado->pais,
            'fecha_inicio' => $certificado->fecha_emision,
            'fecha_fin' =>  $certificado->fecha_final , 
            'asegurados' => Array($asegurados)
        
        ];
        
        /* return view('vista-pdf', $data); */
        $pdf = PDF::loadView('vista-pdf', $data);
        $archivo = 'polizaCovidTaker'.$certificado->doc_numero.'.pdf';  
        file_put_contents( 'certificados/'.$archivo, $pdf->output()); 
      
        $archivoSave = Certificado::find($id);
        $archivoSave->archivo = $archivo;
        $archivoSave->save();

        return $pdf->download('polizaCovidTaker'.$certificado->doc_numero.'.pdf');
 
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
