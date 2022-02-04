<?php

namespace App\Http\Controllers;

use App\Models\AdminApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAppController extends Controller
{
    public function register_admin_app(){
        return view('register.register_admin_app');
    }

    public function simpan_data_baru_admin_app(Request $request){
        $request->validate([
            'nik'=>'required|unique:admin_apps|min:16',
            'nama'=>'required',
            'password'=>'required',
        ],[
            'nik.required'=>'NIK tidak boleh kosong',
            'nik.unique'=>'NIK sudah digunakan',
            'nama.required'=>'Nama tidak boleh kosong',
            'password.required'=>'Password tidak boleh kosong',
        ]);
        $data_baru = new AdminApp();
        $data_baru->nik = $request->nik;
        $data_baru->nama = $request->nama;
        $data_baru->password = Hash::make($request->password);
        $data_baru->save();
        return redirect('register_admin_app');
        
    }

    public function login_admin_app(){
        return view('login.login_admin_app');
    }

    public function cek_login_admin_app(Request $request){
        $request->validate([
            'nik'=>'required',
            'password'=>'required',
        ],[
            'nik.required'=>'NIK tidak boleh kosong',
            'password.required'=>'Password tidak boleh kosong',
        ]);
        $cek_login = AdminApp::where('nik','=',$request->nik)->first();
        if($cek_login){
            if(Hash::check($request->password,$cek_login->password)){
                $request->session()->put('LoggedAdminApp',$cek_login->id);
                return redirect('dashboard_admin_app');
            }else{
                return redirect()->back()->with('error', 'Password salah !');
            }
        }else{
            return redirect()->back()->with('error', 'NIK tidak terdaftar !');
        }
    }

    public function dashboard_admin_app(){
        if (session()->has('LoggedAdminApp')){
            $data_admin_untuk_dashboard = AdminApp::where('id','=',session('LoggedAdminApp'))->first();
            $data = [
                'LoggedUserInfo'=>$data_admin_untuk_dashboard,
            ];
            return view('dashboard.dashboard_admin_app',$data);
        }else{
            return view('login.login_admin_app');
        }
    }

    public function logout_admin_app(){
        if (session()->has('LoggedAdminApp')){
            session()->pull('LoggedAdminApp');
            return redirect('login_admin_app');
        }else{
            return view('login.login_admin_app');
        }
    }

    public function simpan_perubahan_data_profil_admin_app(Request $request){
        if (session()->has('LoggedAdminApp')){
            $request->validate([
                'nama'=>'required',
            ],[
                'nama.required'=>'Nama tidak boleh kosong',
            ]);
            $admin_data = AdminApp::find($request->id);
            $admin_data->nama = $request->nama;
            $admin_data->save();
            return redirect('dashboard_admin_app');
        }else{
            return view('login.login_admin_app');
        }
    }

    public function simpan_perubahan_data_password_admin_app(Request $request){
        if (session()->has('LoggedAdminApp')){
            $request->validate([
                'password_baru'=>'required',
            ],[
                'password_baru.required'=>'Password tidak boleh kosong',
            ]);
            $admin_data = AdminApp::find($request->id);
            $admin_data->password = Hash::make($request->password_baru);
            $admin_data->save();
            return redirect('dashboard_admin_app');
        }else{
            return view('login.login_admin_app');
        }
    }

    public function simpan_perubahan_data_foto_admin_app(Request $request){
        if (session()->has('LoggedAdminApp')){
            $admin_data = AdminApp::find($request->id);
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            $extension = $request->file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $request->file->move(public_path('foto_admin_app'),$filename);
            $data = $filename;
            $admin_data->foto = $data;
            $admin_data->save();
            return redirect('dashboard_admin_app');
        }else{
            return view('login.login_admin_app');
        }
    }
}
