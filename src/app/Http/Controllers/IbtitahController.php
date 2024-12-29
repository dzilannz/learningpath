<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Ibtitah;
use Illuminate\Support\Facades\Auth;

class IbtitahController extends Controller
{
    // LearningPathController - submitProof
    public function submitProof(Request $request, $mahasiswaId, $kategori)
    {
        $validCategories = ['tilawah', 'tahfidz', 'ibadah'];
        if (!in_array($kategori, $validCategories)) {
            return back()->withErrors(['error' => 'Invalid category.']);
        }

        $request->validate([
            'proof_file' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Simpan file ke storage
        $filePath = $request->file('proof_file')->store('proofs', 'public');

        // Buat entri baru berdasarkan kategori
        Ibtitah::create([
            'mahasiswa_id' => $mahasiswaId,
            'kategori' => $kategori,
            'file_path' => $filePath,
            'status' => 'pending',
            $kategori => false, // Tandai kategori terkait sebagai false
        ]);

        return back()->with('success', 'Proof submitted successfully! File menunggu persetujuan admin.');
    }

    
    public function approve($id)
    {
        $ibtitah = Ibtitah::findOrFail($id);

        // Perbarui status ke approved
        $ibtitah->update([
            'status' => 'approved',
        ]);

        return back()->with('success', ucfirst($ibtitah->kategori) . ' approved successfully!');
    }

    



    public function showPending()
    {
        $ibtitahs = Ibtitah::with('mahasiswa')
            ->where('status', 'pending')
            ->get();

        return view('dashboard_admin', compact('ibtitahs'));
    }

    public function showAdminProfile()
    {
        // Ambil data admin dari session
        $adminName = session('user.name', 'Admin'); // Fallback ke 'Admin' jika session tidak ditemukan
    
        // Ambil data Ibtitah dengan status 'pending'
        $ibtitahs = Ibtitah::with('mahasiswa')->where('status', 'pending')->get();
    
        // Kirim data ke view
        return view('admin_profile', compact('adminName', 'ibtitahs'));
    }    
    

}