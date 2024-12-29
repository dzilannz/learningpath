<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $identifier = $request->input('identifier');
        $password = $request->input('password');
    
        // Cek apakah login sebagai admin
        $admin = Admin::where('nip', $identifier)->first();
        if ($admin && Hash::check($password, $admin->password)) {
            // Simpan data admin ke session
            $request->session()->put('user', [
                'id' => $admin->id,
                'name' => $admin->name,
                'role' => 'admin'
            ]);
            return redirect()->route('dashboard.admin');
        }
    
        // Cek apakah login sebagai mahasiswa
        $mahasiswa = Mahasiswa::where('nim', $identifier)->first();
        if ($mahasiswa && Hash::check($password, $mahasiswa->password)) {
            // Simpan data mahasiswa ke session
            $request->session()->put('user', [
                'id' => $mahasiswa->id,
                'name' => $mahasiswa->nama,
                'role' => 'mahasiswa'
            ]);
            return redirect()->route('dashboard', ['mahasiswaId' => $mahasiswa->id]);
        }
    
        // Jika login gagal
        return back()->withErrors(['login' => 'NIM/NIP atau Password salah!']);
    }    

    public function logout(Request $request)
    {
         // Hapus data dari session
        $request->session()->forget('user');
        // Redirect ke halaman login
        return redirect()->route('login.form');
    }

}

