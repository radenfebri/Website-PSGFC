<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'footers';

    protected $fillable = [
        'link_fb', 'link_wa', 'link_yt','link_ig', 'alamat', 'no_hp','email',
    ];

    protected $hidden = [];
}
