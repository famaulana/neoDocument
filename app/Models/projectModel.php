<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class projectModel extends Model
{
    protected $table = 'project';

    public function storeData($data)
    {
        if (projectModel::insert($data)){
            return true;
        }else{
            return false;
        }
    }

    public function deleteData($data)
    {
        if(projectModel::where('name', $data)->delete()){
            return true;
        } else {
            return false;
        }
    }

    public static function getNameProject()
    {
        $data = projectModel::pluck('name');
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
        $this->connectToDatabase($connection);
        $dataReturn = DB::connection($connection['host'])->table($detailProject['table'])->get();
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
        Config::set('database.connections.'.$data['host'].'.database', $data['database']);
    }
}
