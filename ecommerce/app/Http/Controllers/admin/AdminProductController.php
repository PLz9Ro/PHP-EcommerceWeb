<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $data['getRecord'] = Product::getRecord();
        $data['header_title'] = "Product";
        return view('admin.product.index', $data);
    }
    public function create()
    {
        $data['header_title'] = "Add New Product";
        return view('admin.product.create', $data);
    }

    public function store(Request $request)
    {
        $title = trim($request->title);
        $product = new Product;
        $product->title = $title;
        $product->created_by = Auth::user()->id;
        $product->save();
        $slug = Str::slug($title, "-");
        Product::checkSlug($slug);
        $checkSlug = Product::checkSlug($slug);
        if (empty($checkSlug)) {
            $product->slug = $slug;
        } else {
            $new_slug = $slug . '-' . $product->id;
            $product->slug = $new_slug;
            $product->save();
        }
        return redirect('admin/product/edit' . $product->id);
    }

    public function edit($product_id)
    {
        $product = Product::getSingle($product_id);
        if (!empty($product)) {
            $data['getCategory']=Category::getRecordActive();
            $data['product'] = $product;
            $data['header_title'] = "Edit Product";
            return view('admin.product.edit', $data);
        }
    }
}
