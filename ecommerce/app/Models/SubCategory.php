<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'subcategory';

    static public function getSingle($id)
    {
        return self::find($id);
    }
    static public function getRecord()
    {
        return self::select('subcategory.*', 'users.name as created_by_name', 'category.name as category_name')
            ->join('category', 'category.id', '=', 'subcategory.category_id')
            ->join('users', 'users.id', '=', 'subcategory.created_by')
            ->orderBy('subcategory.id', 'desc')
            ->paginate(10);
    }
    static public function getRecordCategory($category_id)
    { 
        
            return self::select('subcategory.*')
                ->join('category', 'category.id', '=', 'subcategory.category_id')
                ->join('users', 'users.id', '=', 'subcategory.created_by')
                ->where('subcategory.status','=', 1)
                ->where('subcategory.category_id','=', $category_id)   
                ->orderBy('subcategory.name', 'asc')
                ->paginate(10);
       
    }
}
