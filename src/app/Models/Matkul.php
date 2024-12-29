<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matkul extends Model
{
    use HasFactory;

    protected $table = 'matkul'; // Pastikan nama tabel benar

    protected $fillable = ['nama', 'sks', 'semester_id']; // Pastikan kolom ini sesuai dengan tabel

    /**
     * Relationship: Matkul belongs to Semester
     */
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

}
