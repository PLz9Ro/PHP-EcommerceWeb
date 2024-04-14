<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Authcontroller extends Controller
{
    public function login_admin()
    {

        if (!empty(Auth::check() && Auth::user()->role == 1)) {
        }
        return view("admin.login");
    }
    public function auth_login_admin(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password, 'role' => 1, 'status' => 1])) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Please entrer current email and password');
        }
    }
    public function logout_admin()
    {
        Auth::logout();
        return redirect("admin");
    }
    public function auth_register(Request $request)
    {
        $checkEmail = User::checkEmail($request->email);
        if (empty($checkEmail)) {
            $save = new User;
            $save->name = trim($request->name);
            $save->email = trim($request->email);
            $save->password = Hash::make($request->password);
            $save->role = 0;
            $save->status = 1;
            $save->save();
            Mail::to($save->email)->send(new RegisterMail($save));
            $json['status'] = true;
            $json['message'] = "Your account has been successfully created. Check Email to Validation ";
        } else {
            $json['status'] = false;
            $json['message'] = "This email is already registered. Please choose another one.";
        }
        echo json_encode($json);
    }
    // public function auth_login(Request $request)
    // {
    //     $remember = empty($request->is_remember) ? false : true;
    //     if(Auth::attempt(['email'=>$request->email,'password'=>$request->getPassword,'status'=>0],$remember)){
    //         if(!empty(Auth::user()->email_verified_at)){
    //             $json['status']=true;
    //             $json['message'] ='sucsses';
    //         }
    //         else{
    //             $json['status']=true;
    //             $json['message'] ='your account email is not verified';
    //         }


    //     }
    //     else{
    //         $json['status']=true;
    //         $json['message'] ='plase enter currect email and password ';
    //     }

    //     echo json_encode($json);

    // }
    public function auth_login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');
        $remember = $request->has('is_remember');

        if (Auth::attempt($credentials, $remember)) {
            // Check if the user's email is verified
            if (Auth::user()->email_verified_at !== null) {
                // Return success response
                return response()->json([
                    'status' => true,
                    'message' => 'Login successful',
                ]);
            } else {
                // Send email verification and logout the user
                $user = Auth::user();
                Mail::to($user->email)->send(new RegisterMail($user));
                Auth::logout();

                // Return response for unverified email
                return response()->json([
                    'status' => false,
                    'message' => 'Your email is not verified. Please check your inbox for verification instructions.',
                ]);
            }
        } else {
            // Return error response for invalid credentials
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password',
            ]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('index');
    }
    public function activate_email($id)
    {
        $id = base64_decode($id);
        $user = User::getSingle($id);
        $user->email_verified_at = date('Y-m-d H:i:s');
        $user->save();

        return redirect(url('index'))->with('success', "Email successfully verified");
    }
}
