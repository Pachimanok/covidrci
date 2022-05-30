<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class estadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        
        $transferenciasTodas = DB::table('transferencias')->selectRaw('sum(certificados.costo) as sum, count(*) as count, certificados.user')->join('certificados','transferencias.id', '=' ,'certificados.id_transferencia')->groupBy('id_transferencia')->get();
        $transferenciasSemana = DB::table('transferencias')->selectRaw('sum(certificados.costo) as sum,count(*) as count, certificados.user')->join('certificados','transferencias.id', '=' ,'certificados.id_transferencia')->whereDate('certificados.created_at', $now)->groupBy('id_transferencia')->get();
        return view('admin.Estadisticas')->with('trasferenciasTodas',$transferenciasTodas)->with('trasferenciasSemana',$transferenciasSemana);
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
        //
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
