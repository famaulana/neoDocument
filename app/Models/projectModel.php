<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectModel extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'tbl_virtual_sales';
}
