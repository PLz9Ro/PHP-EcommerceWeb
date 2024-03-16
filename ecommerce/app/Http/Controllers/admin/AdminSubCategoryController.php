<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSubCategoryController extends Controller
{
    public function index(){
        $data['getRecord'] = SubCategory::getRecord();
        $data['header_title'] = "Sub Category";
        return view('admin.subcategory.index', $data);
    }
    public function create(){
        $data['getSubCategory'] = Category::getCategory();
        $data['header_title'] = "Create Sub Category";
        return view('admin.subcategory.create', $data);
    }
    public function store(Request $request){
        request()->validate([
            'slug' => 'required|unique:category'
        ]);
        $subcategory = new SubCategory();
        $subcategory->name= trim($request->name);
        $subcategory->category_id= trim($request->category_id);
        $subcategory->slug= trim($request->slug);
        $subcategory->status= trim($request->status);
        $subcategory->meta_title= trim($request->meta_title);
        $subcategory->meta_description= trim($request->meta_description);
        $subcategory->meta_keys= trim($request->meta_keys);
        $subcategory->created_by = Auth::user()->id;
        $subcategory -> save();
        
        return redirect('admin/subcategory')->with('success', 'SubCategory Success Create');

    }

    public function edit($id){
        $data['getSubCategory'] = Category::getCategory();
        $data['getRecord'] = SubCategory::getSingle($id);
        $data['header_title'] = "Edit Sub Category";
        return view('admin.subcategory.edit', $data);
    
    }

    public function update(Request $request, $id){
        request()->validate([
            'slug' => 'required|unique:SubCategory,slug,' .$id
        ]);
        $subcategory = SubCategory::getSingle($id);
        $subcategory->category_id= trim($request->category_id);
        $subcategory->name= trim($request->name);
        $subcategory->slug= trim($request->slug);
        $subcategory->status= trim($request->status);
        $subcategory->meta_title= trim($request->meta_title);
        $subcategory->meta_description= trim($request->meta_description);
        $subcategory->meta_keys= trim($request->meta_keys);
        $subcategory->created_by = Auth::user()->id;
        $subcategory -> save();
        
        return redirect('admin/subcategory')->with('success', 'SubCategory Success Create');
    }
    public function destroy($id){
        $SubCategory = SubCategory::find($id);
        if (!$SubCategory ) {
            return redirect()->back()->with('error', 'SubCategory not found');
        }
        $SubCategory ->delete();

        return redirect()->back()->with('success', 'SubCategory deleted successfully');
    }


    public function get_sub_cate(Request $request){
        $category_id = $request->id;
        $get_sub_category = SubCategory::getRecordCategory($category_id);
        $html   ='';
        $html .= '<option value="">Select</option>';
        foreach( $get_sub_category as $value ) {
            $html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        $json ['html'] = $html;
        echo json_encode($json);
    }
}