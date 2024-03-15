<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";
    static public function getSingle ($id){
        return self::find($id);
    } 
    static public function getCategory()
    {
        return self::select('category.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'category.created_by')
            ->orderBy('category.id', 'desc')
            ->get();
    }
    static public function getRecordActive()
    {
        return self::select('category.*')
            ->join('users', 'users.id', '=', 'category.created_by')
            ->where('category.status','=','1')
            ->orderBy('category.name', 'asc')
            ->get();
    }
}
