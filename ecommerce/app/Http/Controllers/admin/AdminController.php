<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin List";
        return view('admin.admin.index', $data);
    }
    public function create()
    {
        $data['header_title'] = "Create Admin";
        return view('admin.admin.create', $data);
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->role = 1;
        $user->save();

        return redirect('admin/list')->with('success', 'Admin Success Create');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        $data['header_title'] = "Edit Admin";
        return view('admin.admin.edit', $data);
    }
    public function update($id, Request $request)
    {
        $user = User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->role = 1;
        $user->save();

        return redirect('admin/list')->with('success', 'Admin Success Create');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
