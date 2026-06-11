<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HadrohGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_grup',
        'nama_majelis',
        'daerah',
        'nomor_hp',
        'foto', // Tempat menyimpan array banyak foto
    ];

    // WAJIB TAMBAHKAN INI: Agar Laravel otomatis mengubah teks database menjadi array PHP
    protected $casts = [
        'foto' => 'array',
    ];
}