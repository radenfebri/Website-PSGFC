<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $fillable = [
        'link_fb', 'link_wa', 'link_yt','link_ig','link_embed', 'body',
    ];

    protected $hidden = [];
}
