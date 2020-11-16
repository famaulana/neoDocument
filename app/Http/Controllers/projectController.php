<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Exports\dataExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;
use Carbon\Carbon;

class projectController extends Controller
{
    public function index()
    {
        if(Session::get('login') != null){
            $data = array(
                'title' => 'Project',
            );
            return view('pages/project', $data);
        }else{
            return redirect('/login');
        }
    }

    public function daihatsuLeads()
    {
        $nameTable = DB::connection('mysql2')->select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tbl_virtual_sales'");
        $dataTable = DB::connection('mysql2')->table('tbl_virtual_sales')->get();
        $data = array(
            'title' => 'Project - Daihatsu Leads',
            'heading' => 'Daihatsu Leads',
            'dataTable' => $dataTable,
            // 'nameTable' => $nameTable,
        );
        return view('pages/project', $data);
    }

    public function daihatsuLeadsExport(){
        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        return Excel::download(new dataExport, 'daihatsuleads-'.$mytime.'.xlsx');
    }
}
