<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_urusan',
        'file_urusan',
    ];
}
