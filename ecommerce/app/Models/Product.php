<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    static public function getSingle ($id){
        return self::find($id);
    } 
    static public function getRecord (){
        return self::select('product.*','users.name as created_by_name)')
                    ->join('users','users.id','=','product.created_by')
                    ->orderBy('product.id','desc')
                    ->paginate(1);
    }
    protected $table = "product";
    static public function checkSlug ($slug){
        return self::where("slug", "=",$slug)->count();
    }
    
}
