<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminColorController extends Controller
{
    public function index(){
        $data['getRecord'] = Color::getRecord();
        $data['header_title'] = "Color List";
        return view('admin.color.index', $data);

    }
    public function create(){
        $data['header_title'] = "Add New Color ";
        return view('admin.color.create', $data);
    }
    public function store(Request $request){
        $color = new Color();
        $color->name= trim($request->name);
        $color->code= trim($request->code);
        $color->status= trim($request->status);
        $color->created_by = Auth::user()->id;
        $color -> save();
        
        return redirect('admin/color')->with('success', 'Color Success Create');

    }
    public function edit($id)
    {
        $data['getRecord'] = Color::getSingle($id);
        $data['header_title'] = "Edit Color";
        return view('admin.color.edit', $data);
    }
    public function update(Request $request, $id){
        $color = Color::getSingle($id);
        $color->name= trim($request->name);
        $color->code= trim($request->code);
        $color->status= trim($request->status);
        $color->created_by = Auth::user()->id;
        $color -> save();
        
        return redirect('admin/color')->with('success', 'Color Success Update');
    }
    public function destroy($id){
        $color = Color::find($id);
        if (!$color ) {
            return redirect()->back()->with('error', 'Color not found');
        }
        $color ->delete();

        return redirect()->back()->with('success', 'Color deleted successfully');
    }
}
