<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use DB;

class projectModel extends Model
{
    protected $table = 'project';

    public static function getNameProject()
    {
        $data = DB::table('project')->pluck('name');
        return $data;
    }

    public function getDetailProject($nameProject)
    {
        $dataProject = projectModel::where('name', $nameProject)->first();
        return $dataProject;
    }

    public function getData($detailProject){
        $host = $this->checkDatabase($detailProject->host);
        $connection = array(
            'host' => $host,
            'database' => $detailProject->database,
        );
        $database = $this->connectToDatabase($connection);
        $dataReturn = DB::connection($connection['host'])->table($detailProject['table'])->get();
        // dd($dataReturn);
        return $dataReturn;
    }

    public function checkDatabase($data){
        if($data == "cms.daihatsu.co.id"){
            $result = "mysql2";
            return $result;
        } else if($data == "daihatsu.co.id"){
            $result = "mysql3";
            return $result;
        } else{
            $result = "mysql";
            return $result;
        }
    }

    public function connectToDatabase($data)
    {
        $lastDB = $data['host'];
        Config::set('database.connections.'.$data['host'].'.database', $data['database']);
        return $lastDB;
    }
}
