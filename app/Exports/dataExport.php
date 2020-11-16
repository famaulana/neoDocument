<?php

namespace App\Exports;

// use App\project;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Illuminate\Database\Query\Builder;
// use Illuminate\Support\Arr;

use Maatwebsite\Excel\Concerns\FromArray;
// use DB;

// class dataExport implements FromCollection
class dataExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }
}
