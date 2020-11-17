<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use App\Exports\dataExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\projectModel;
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

    public function addProject()
    {
        # code...
    }

    public function projectOverview($nameProject)
    {
        // BIKIN INI DYNAMIC!!!
        $project = new projectModel;
        $detailProject = $project->getDetailProject($nameProject);
        $dataTable = $project->getData($detailProject);
        $project = projectModel::getNameProject();
        $data = array(
            'title' => 'Project - '.$detailProject['name'],
            'project' => $project,
            'heading' => $detailProject['name'],
            // make dynamic data to dynamic proccess(biar bisa export di semua table)
            'dataTable' => $dataTable,
            // make dynamic data to dynamic proccess(biar bisa export di semua table)
            'nameProject' => $detailProject['name']
        );
        return view('pages/project', $data);
    }

    public function export($nameProject){
        // get time for name of file
        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        // get all data by tbl_virtual_sales
        $project = new projectModel;
        $detailProject = $project->getDetailProject($nameProject);
        $dataTable = $project->getData($detailProject);
        // wrap to array for passing for proccess function after 
        $data = array(
            // get by url data from function before(see on route and view)
            'nameTable' =>$detailProject['table'],
            'dataTable' => $dataTable
        );
        // pass data to function after for sort and change from std object to array
        $dataExport = $this->transposeData($data);
        // pass data to Export library on Export/dataExport
        $export = new dataExport([
            // data by proccess of transposeData & mergeData function
            $dataExport
        ]);
        // return excel file download to view
        return Excel::download($export, 'daihatsuleads-'.$mytime.'.xlsx');
    }

    public function transposeData($data)
    {
        // Variable coverted std object to array
        $result = array();
        $resultData = array();
        // get column name by table
        $nameTable = DB::connection('mysql2')->select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "."'".$data['nameTable']."'");
        // covert column name from std object to array & store to variable result
        foreach($nameTable as $row => $columns){
            foreach($columns as $row2 => $columns2){
                $result[$row2][$row] = $columns2;
            }
        }
        // covert data from std object to array & store to variable resultData
        foreach($data['dataTable'] as $row => $columns){
            $resultData[$row] = (array)$columns;
        }
        // wrap table name & data to array for passing to merge
        $result = array(
            'nameTable' => $result,
            'dataTable' => $resultData
        );
        // pass data to merge table name & data
        $result = $this->mergeData($result);
        // pass data result to export become excel on function before
        return $result;
    }
    
    // merging data
    public function mergeData($dataMerge)
    {
        // define data array to variable
        $dataTable = $dataMerge['dataTable'];
        $dataColumns = $dataMerge['nameTable'];
        // variable to keep result for merging
        $result = [];
        // insert table name to variable result for header of excel
        foreach($dataColumns as $column){
            $result[0] = (array)$column;
        }
        // insert all data to variable result to make it below table name
        foreach($dataTable as $data){
            array_push($result, $data);
        }
        // pass data merge to function before
        return $result;
    }
}
