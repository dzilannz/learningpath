<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MahasiswaSemester extends Model
{
    // Table name
    protected $table = 'mahasiswa_semester';

    // Mass assignable fields
    protected $fillable = [
        'mahasiswa_id',
        'semester_id',
        'sks_diambil'
    ];

    // Relationship with Mahasiswa
    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    // Relationship with Semester
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
}
