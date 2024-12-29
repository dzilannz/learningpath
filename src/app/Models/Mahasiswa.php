<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable = ['nama', 'nim', 'password'];

    public function semesters()
    {
        return $this->belongsToMany(Semester::class, 'mahasiswa_semester', 'mahasiswa_id', 'semester_id');
    }

    public function matkuls()
    {
        return $this->belongsToMany(Matkul::class, 'mahasiswa_matkul', 'mahasiswa_id', 'matkul_id');
    }
}