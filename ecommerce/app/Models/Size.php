<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = "size";
    static public function getSingle ($id){
        return self::find($id);
    } 
    static public function getRecord()  
    {
        return self::select('size.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'size.created_by')
            ->orderBy('size.id', 'asc')
            ->get();
    }
    static public function getRecordActive()  
    {
        return self::select('size.*')
            ->join('users', 'users.id', '=', 'size.created_by')
            ->where('size.status','=','1')
            ->orderBy('size.id', 'asc')
            ->get();
    }
}
