<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Ibtitah;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class IbtitahController extends Controller
{
        // LearningPathController - submitProof
        public function submitProof(Request $request)
        {
            Log::info('Submit proof dimulai.');

            // Validasi input
            $validator = Validator::make($request->all(), [
                'proof_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'kategori' => 'required|string|in:tilawah,tahfidz,ibadah',
                'mahasiswa_id' => 'required|exists:mahasiswa,id',
            ]);

            if ($validator->fails()) {
                Log::info('Validasi gagal: ' . json_encode($validator->errors()));
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Ambil mahasiswa
            $mahasiswa = Mahasiswa::find($request->input('mahasiswa_id'));

            if (!$mahasiswa) {
                Log::info('Mahasiswa tidak ditemukan.');
                return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
            }

            Log::info('Mahasiswa ditemukan: ' . $mahasiswa->id);

            // Upload file ke storage
            $file = $request->file('proof_file');
            $filePath = $file->store('ibtitah/proofs', 'public');
            Log::info('File berhasil diunggah ke: ' . $filePath);

            // Update submission
            $existingSubmission = Ibtitah::firstOrNew(['mahasiswa_id' => $mahasiswa->id]);
            $kategori = $request->input('kategori');

            switch ($kategori) {
                case 'tilawah':
                    $existingSubmission->tilawah = true;
                    break;
                case 'tahfidz':
                    $existingSubmission->tahfidz = true;
                    break;
                case 'ibadah':
                    $existingSubmission->ibadah = true;
                    break;
            }
            $existingSubmission->kategori = $kategori;
            $existingSubmission->file_path = $filePath;
            $existingSubmission->status = 'pending';
            $existingSubmission->save();

            Log::info('Data berhasil disimpan: ' . json_encode($existingSubmission));

            return redirect()->back()->with('success', 'File berhasil diunggah, menunggu persetujuan admin.');
        }
     

}