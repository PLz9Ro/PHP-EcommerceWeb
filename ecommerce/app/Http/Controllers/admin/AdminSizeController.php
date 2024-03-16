<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSizeController extends Controller
{
    public function index(){
        $data['getRecord'] = Size::getRecord();
        $data['header_title'] = "Size List";
        return view('admin.size.index', $data);
    }
    public function create(){
        $data['header_title'] = "Add New Size ";
        return view('admin.size.create', $data);
    }
    public function store(Request $request){
        $size = new Size();
        $size->name= trim($request->name);
        $size->slug= trim($request->slug);
        $size->status= trim($request->status);
        $size->created_by = Auth::user()->id;
        $size -> save();
        
        return redirect('admin/size')->with('success', 'Size Success Create');
    }
    public function edit($id)
    {
        $data['getRecord'] = Size::getSingle($id);
        $data['header_title'] = "Edit Size";
        return view('admin.size.edit', $data);
    }
    public function update(Request $request, $id){
        $color = Size::getSingle($id);
        $color->name= trim($request->name);
        $color->slug= trim($request->slug);
        $color->status= trim($request->status);
        $color->created_by = Auth::user()->id;
        $color -> save();
        
        return redirect('admin/size')->with('success', 'Size Success Update');
    }
    public function destroy($id){
        $size = Size::find($id);
        if (!$size ) {
            return redirect()->back()->with('error', 'Size not found');
        }
        $size ->delete();

        return redirect()->back()->with('success', 'Size deleted successfully');
    }
}
