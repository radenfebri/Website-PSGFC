<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    use HasFactory;

    protected $table = 'iklans';

    protected $fillable = [
        'judul','link','gambar_iklan','status'
    ];

    protected $hidden = [];
}
