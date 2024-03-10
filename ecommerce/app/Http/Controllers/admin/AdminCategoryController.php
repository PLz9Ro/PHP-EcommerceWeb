<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $data['getCategory'] = Category::getCategory();
        $data['header_title'] = "Category List";
        return view('admin.category.index', $data);
    }
    public function create()
    {
        $data['header_title'] = "Create Category";
        return view('admin.category.create', $data);
    }
    public function store(Request $request){
        request()->validate([
            'slug' => 'required|unique:category'
        ]);
        $category = new Category();
        $category->name= trim($request->name);
        $category->slug= trim($request->slug);
        $category->status= trim($request->status);
        $category->meta_title= trim($request->meta_title);
        $category->meta_description= trim($request->meta_description);
        $category->meta_keys= trim($request->meta_keys);
        $category->create_by = Auth::user()->id;
        $category -> save();
        
        return redirect('admin/category')->with('success', 'Category Success Create');

    }
    public function edit($id)
    {
        $data['getRecord'] = Category::getSingle($id);
        $data['header_title'] = "Edit Category";
        return view('admin.category.edit', $data);
    }
    public function update(Request $request, $id){
        request()->validate([
            'slug' => 'required|unique:category,slug,' .$id
        ]);
        $category = new Category();
        $category->name= trim($request->name);
        $category->slug= trim($request->slug);
        $category->status= trim($request->status);
        $category->meta_title= trim($request->meta_title);
        $category->meta_description= trim($request->meta_description);
        $category->meta_keys= trim($request->meta_keys);
        $category->created_by = Auth::user()->id;
        $category -> save();
        
        return redirect('admin/category')->with('success', 'Category Success Create');
    }
    public function destroy($id){
        $category = Category::find($id);
        if (!$category ) {
            return redirect()->back()->with('error', 'category not found');
        }
        $category ->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
