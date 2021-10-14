<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'judul','slug','user_id','gambar_artikel','is_active','body'
    ];

    protected $hidden = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
