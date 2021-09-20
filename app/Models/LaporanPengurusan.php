<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengurusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengurusan_id',
        'user_id',
        'status',
        'file_user',
        'file_admin',
        'admin_id',
    ];
}
