<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index($slug)
    {    
        $getCategory = Category::getSingleSlug($slug);
        
        $getProduct= Product::getProduct(); 
        if(!empty($getCategory)){
            $data['getCategory']=  $getCategory;
            $data['products'] = $getProduct; 
            return view('product.index',  $data);
        }
        else{
            abort(404);
        }
    }
}
