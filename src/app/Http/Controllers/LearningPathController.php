<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Semester;
use App\Models\Ibtitah;
use App\Models\Sidang;
use App\Models\Matkul;
use App\Models\MahasiswaSemester;
use App\Models\MahasiswaMatkul;
use Illuminate\Http\Request;

class LearningPathController extends Controller
{
    public function show($mahasiswaId, Request $request)
    {
        if (!$request->session()->has('user')) {
            return redirect()->route('login.form');
        }

        $mahasiswa = Mahasiswa::findOrFail($mahasiswaId);

        // Fetch Kuliah data
        $semesters = Semester::all();
        $takenSemesters = MahasiswaSemester::where('mahasiswa_id', $mahasiswaId)->get();

        // Fetch Ibtitah data
        $ibtitah = Ibtitah::where('mahasiswa_id', $mahasiswaId)->first();

        // Fetch Sidang data
        $sidang = Sidang::where('mahasiswa_id', $mahasiswaId)->first();

        return view('dashboard', compact('mahasiswa', 'semesters', 'takenSemesters', 'ibtitah', 'sidang'));
    }

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
    
        // Tambahkan data ke database sebagai `pending`
        Ibtitah::create([
            'mahasiswa_id' => $mahasiswaId,
            'kategori' => $kategori,
            'file_path' => $filePath,
            'status' => 'pending', // Menunggu approval
        ]);
    
        return back()->with('success', 'Proof submitted successfully! File menunggu persetujuan admin.');
    }
    

    public function showMatkul($semesterId, Request $request)
    {
        $semester = Semester::findOrFail($semesterId);

        // ID mahasiswa dari session
        $mahasiswaId = $request->session()->get('user.id');
        
        // Semua mata kuliah untuk semester tertentu
        $allCourses = Matkul::where('semester_id', $semesterId)->get();
        
        // Ambil status mata kuliah dari mahasiswa_matkul
        $mahasiswaMatkul = MahasiswaMatkul::where('mahasiswa_id', $mahasiswaId)
            ->whereIn('matkul_id', $allCourses->pluck('id'))
            ->with('matkul')
            ->get();
        
        // Pisahkan berdasarkan status
        $taken = $mahasiswaMatkul->where('status', 'diambil')->pluck('matkul_id')->toArray();
        $notTaken = $allCourses->filter(function ($course) use ($taken) {
            return !in_array($course->id, $taken);
        });
        
        // Debugging untuk validasi
        dd([
            'All Courses' => $allCourses->toArray(),
            'Taken IDs' => $taken,
            'Not Taken' => $notTaken->toArray(),
        ]);
        
        return view('matkul', [
            'semester' => $semester,
            'taken' => $allCourses->whereIn('id', $taken),
            'notTaken' => $notTaken,
        ]);
    }

}
