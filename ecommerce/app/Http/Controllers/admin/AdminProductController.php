<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
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
        return redirect('admin/product' . $product->id);
    }

    public function edit($product_id)
    {

        $product = Product::getSingle($product_id);
        if (!empty($product)) {
            $data['getCategory'] = Category::getRecordActive();
            $data['getBrand'] = Brand::getRecordActive();
            $data['getColor'] = Color::getRecordActive();
            $data['getSize'] = Size::getRecordActive();
            $data['product'] = $product;
            $data['header_title'] = "Edit Product";
            return view('admin.product.edit', $data);
        }
    }
    public function update(Request $request, $product_id)
    {

        $product = Product::getSingle($product_id);
        if (!empty($product)) {

            if (!empty($request->file('image'))) {
                foreach ($request->file('image') as $value) {

                    if ($value->isValid()) {
                        $ext = $value->getClientOriginalExtension();
                        $randomStr = $product->id . Str::random(20);
                        $filename = strtolower($randomStr) . '.' . $ext;
                        $path = 'upload/product/';
                        $value->move(public_path($path), $filename);
        
                        $imageupload= new ProductImage;
                        $imageupload->image_name = $filename;
                        $imageupload-> image_extension = $ext;
                        $imageupload-> product_id = $product->id;
                        $imageupload->save();
                    }
                }
            }
            $product->title = trim($request->title);
            $product->sku = trim($request->sku);
            $product->status = trim($request->status);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->brand_id = trim($request->brand_id);
            $product->price = trim($request->price);
            $product->old_price = trim($request->old_price);
            $product->short_description = trim($request->short_description);
            $product->description = trim($request->description);
            $product->shippingreturns = trim($request->shippingreturns);
            $product->created_by = Auth::user()->id;
            $product->save();

            ProductColor::DeleteRecord($product->id);

            if (!empty($request->color_id)) {
                foreach ($request->color_id as $color_id) {
                    $color = new ProductColor();
                    $color->color_id = $color_id;
                    $color->product_id = $product->id;
                    $color->save();
                }
            }

            ProductSize::DeleteRecord($product->id);

            if (!empty($request->size)) {
                foreach ($request->size as $size) {
                    if (!empty($size['name'])) {
                        $saveSize = new ProductSize();
                        $saveSize->name = $size['name'];
                        $saveSize->quatity = $size['quatity'];
                        $saveSize->price = !empty($size['price']) ? $size['price'] : 0;
                        $saveSize->product_id = $product->id;
                        $saveSize->save();
                    }
                }
                return redirect('admin/product')->with('success', 'Category Success Update');
            }
          
           

        }

        
    }
    public function image_delete($id){

        $image= ProductImage::getSingle($id);
    
        if(!empty($image->image_name)){
            unlink('upload/product/'.$image->image_name);
        }
    
        $image->delete();
    
        return redirect()->back()->with('success','Image Delete Success');
    }
}
