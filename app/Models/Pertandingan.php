<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    use HasFactory;

    protected $table = 'pertandingans';

    protected $fillable = [
        'gambar_team1','gambar_team2','nama_team1','nama_team2', 'tanggal_waktu',
    ];

    protected $hidden = [];
}
