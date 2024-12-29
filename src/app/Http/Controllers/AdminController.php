<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ibtitah;
use App\Models\Mahasiswa;

class AdminController extends Controller
{
    public function showPending()
    {
        $ibtitahs = Ibtitah::with('mahasiswa')->where('status', 'pending')->get();
        return view('admin_profile', compact('ibtitahs'));
    }
    public function showAdminProfile()
    {
        $ibtitahs = Ibtitah::with('mahasiswa')->where('status', 'pending')->get();
    
        return view('admin_profile', compact('ibtitahs'));
    }
    
    
    public function showIbtitahForm()
    {
        return view('ibtitah_form'); // Mengarahkan ke ibtitah_form.blade.php   
    }

    public function storeIbtitah(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:15',
            'kategori' => 'required|string|in:tilawah,tahfidz,ibadah',
            'proof_file' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);
    
        // Simpan file proof
        $filePath = $request->file('proof_file')->store('proofs', 'public');
    
        // Cari mahasiswa berdasarkan NIM atau buat baru
        $mahasiswa = Mahasiswa::firstOrCreate(
            ['nim' => $request->nim],
            ['nama' => $request->nama]
        );
    
        // Tambahkan data ke tabel ibtitah
        $ibtitah = Ibtitah::updateOrCreate(
            ['mahasiswa_id' => $mahasiswa->id, 'kategori' => $request->kategori],
            [
                'file_path' => $filePath,
                'status' => 'approved', // Status langsung menjadi approved
                $request->kategori => true, // Tandai kategori sebagai complete
            ]
        );
    
        // Redirect ke halaman admin dengan pesan sukses
        return redirect()->route('admin.profile')->with('success', 'Data berhasil ditambahkan.');
    }    


}
