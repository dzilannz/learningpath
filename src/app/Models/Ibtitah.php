<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibtitah extends Model
{
    use HasFactory;

    protected $table = 'ibtitah';

    protected $fillable = [
        'mahasiswa_id',
        'tilawah',
        'tahfidz',
        'ibadah',
        'status',
        'proof_file',
        'file_path',
        'kategori'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
