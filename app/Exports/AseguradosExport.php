<?php

namespace App\Exports;

use App\Models\Asegurado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class AseguradosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('asegurados')->join('certificados','certificados.id','=','asegurados.id_certificado')->get();
    }
 
}
