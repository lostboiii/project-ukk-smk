<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_masakan',
        'harga',
        'gambar',
        'deskripsi',
        'status_masakan',
    ];
}
