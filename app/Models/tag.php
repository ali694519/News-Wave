<?php

namespace App\Models;

use App\Models\post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tag extends Model
{
    use HasFactory;
    protected $guarded = [];


    // Relationships get the posts from tag
    public function posts()
    {
        return $this->belongsToMany('App\Models\post','tag_post_pivot','tag_id','post_id');
    }



}
