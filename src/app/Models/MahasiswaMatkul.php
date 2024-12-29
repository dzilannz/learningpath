<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaMatkul extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'mahasiswa_matkul';

    // Tentukan kolom yang dapat diisi (mass assignment)
    protected $fillable = ['mahasiswa_id', 'matkul_id', 'status'];
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'matkul_id');
    }
}