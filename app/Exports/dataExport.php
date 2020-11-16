<?php

namespace App\Exports;

// use App\project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use DB;

class dataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $dataHeader = [0=>{"sa":"sda"},];
        // $dataExport = [];
        // $nameTable = DB::connection('mysql2')->select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tbl_virtual_sales'");
        // foreach($nameTable as $key => $data){
        //     array_push($dataHeader, $data->COLUMN_NAME);
        // }
        // array_push($dataExport, $dataHeader);
        $dataTable = DB::connection('mysql2')->table('tbl_virtual_sales')->get();
        // foreach($dataTable as $data){
        //     array_push($dataExport, $data);
        // }
        // dd($dataExport);
        return $dataTable;
    }
}
