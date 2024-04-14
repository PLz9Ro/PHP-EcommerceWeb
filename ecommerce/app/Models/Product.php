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
                    ->orderBy('product.id','asc')
                    ->paginate(10);
    }
    static public function getProduct (){
        return self::select('product.*','users.name as created_by_name)')
                    ->join('users','users.id','=','product.created_by')
                    ->orderBy('product.id','asc')
                    ->paginate(30);
    }
    protected $table = "product";
    static public function checkSlug ($slug){
        return self::where("slug", "=",$slug)->count();
    }

    public function getColor(){
        return $this-> hasMany(ProductColor::class,'product_id');
    }

    public function getImage(){
        return $this-> hasMany(ProductImage::class,'product_id');
    }
    
}
