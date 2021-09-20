<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_keuangan',
        'nominal_keuangan',
        'jenis_keuangan',
        'keterangan_keuangan',
    ];
}
