<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Mail; 
class c_auth extends Controller
{
    public function __construct()
    {
    }
    public function login()
    {

        // $check = Masyarakat::first();
        if (Petugas::exists()) {
            return view('auth/login');
        } else {

            return redirect('/setup');
        }
    }
    public function register()
    {
        return view('auth/register');
    }
    public function action_register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:masyarakat',
            'email' => 'required|email|unique:masyarakat',
            'password' => 'required|min:4',
            'username' => 'required'
        ]);
        // collect all data
        // $insert_data=$request->all()
        Masyarakat::create([
            'nama' => $request['nama'],
            'nik' => $request['nik'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'telp' => $request['telp'],
            'active'=>'active'
        ]);

        return redirect('/login')->with(['message' => 'Register Success']);
    }
    public function login_action(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);
        $login_credentials = [
            'nik' => $request->input('nik'),
            'password' => $request->input('password'),
        ];


        if (Auth::guard('users')->attempt($login_credentials)) {
          
        $user=Masyarakat::where('nik',$login_credentials['nik'])->first();
        if($user->active=='banned'){
             return redirect('/login')->with(['message' => 'your account has been banned']);
        }else{
           
              return redirect('/home');
        }



            
        } else {
            return redirect('/login')->with(['message' => 'Login Failed']);
        }
    }
    public function setup_administrator()
    {
        return view('auth/setup');
    }
    public function setup_action(Request $request)
    {
        $validatedData = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas',
            'password' => 'required',
            'telp' => 'required',
            'level' => 'admin'
        ]);
        Petugas::create([
            'nama_petugas' => $request->input('nama_petugas'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'telp' => $request->input('telp'),
            'level' => 'admin',

        ]);
        return redirect('/login-admin')->with(['message' => 'Setup Success']);
    }
    public function login_admin()
    {
        return view('auth/login-admin');
    }
    public function login_admin_action(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $login_credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];
        $user=Petugas::where('username',$login_credentials['username'])->first();
        if (Auth::guard('admin')->attempt($login_credentials)) {
            // echo Auth::guard('admin')->user()->nama_petugas;
            if($user->active=='active'){
  return redirect('admin-dashboard');
            }else{
                  return redirect('admin_login')->with(['message' => 'Akun telah dinonaktifkan']);
            }
          
        } else {
            return redirect('admin_login')->with(['message' => 'Password atau Username salah']);
        }
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function forgot_password()
    {
        return view('auth/forgot-password');
    }
    public function forgot_password_action(Request $request)
    {
        $request->validate([
            'email' => 'required'
           
        ]);
        // dd($request->email);
        $check = DB::table('password_resets')->where('email',$request->email)->get();
        if($check){
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
    
            Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            });
            return redirect('/forgot-password')->with(['message' => 'Check Your Email']);
        }else{
            return redirect('/forgot-password')->with(['message' => 'Link to reset has been sent']);
        }
       
        
        
    }
    public function forgot_password_form($token){
        $data_user = DB::table('password_resets')->where('token',$token)->first();
        // dd($data_user);
        return view('auth/forgot-password-form',['token'=>$token,'data_user'=>$data_user]);

    }
    public function forgot_password_form_submit(request $request){
        $request->validate([
            'email' => 'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);
        Masyarakat::where('email',$request->email)->update(['password'=>Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect('/login')->with(['message' => 'Your Password has been changed']);
    }
}
