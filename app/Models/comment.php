<?php

namespace App\Models;

use App\Models\post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;
      protected $fillable = [
        'body',
        'post_id',
    ];

     // Relationships get the posts from comment
    public function post() {
        return $this->belongsTo(post::class);
    }
}
