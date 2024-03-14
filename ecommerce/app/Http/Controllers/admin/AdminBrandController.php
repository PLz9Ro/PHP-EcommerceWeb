<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBrandController extends Controller
{
    public function index(){
        $data['getRecord'] = Brand::getRecord();
        $data['header_title'] = "Brand List";
        return view('admin.brand.index', $data);

    }

    public function create(){
        $data['header_title'] = "Add New Brand ";
        return view('admin.brand.create', $data);
    }
    public function store(Request $request){
        request()->validate([
            'slug' => 'required|unique:brand'
        ]);
        $Brand = new Brand();
        $Brand->name= trim($request->name);
        $Brand->slug= trim($request->slug);
        $Brand->status= trim($request->status);
        $Brand->meta_title= trim($request->meta_title);
        $Brand->meta_description= trim($request->meta_description);
        $Brand->meta_keys= trim($request->meta_keys);
        $Brand->created_by = Auth::user()->id;
        $Brand -> save();
        
        return redirect('admin/brand')->with('success', 'Brand Success Create');

    }
    public function edit($id)
    {
        $data['getRecord'] = Brand::getSingle($id);
        $data['header_title'] = "Edit Brand";
        return view('admin.brand.edit', $data);
    }
    public function update(Request $request, $id){
        request()->validate([
            'slug' => 'required|unique:Brand,slug,' .$id
        ]);
        $brand = Brand::getSingle($id);
        $brand->name= trim($request->name);
        $brand->slug= trim($request->slug);
        $brand->status= trim($request->status);
        $brand->meta_title= trim($request->meta_title);
        $brand->meta_description= trim($request->meta_description);
        $brand->meta_keys= trim($request->meta_keys);
        $brand->created_by = Auth::user()->id;
        $brand -> save();
        
        return redirect('admin/brand')->with('success', 'Brand Success Update');
    }
    public function destroy($id){
        $brand = Brand::find($id);
        if (!$brand ) {
            return redirect()->back()->with('error', 'brand not found');
        }
        $brand ->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully');
    }
}
