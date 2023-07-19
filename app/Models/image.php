<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class image extends Model
{
    use HasFactory;

     protected $fillable = [
        'url',
        'imageable_type',
        'imageable_id'
    ];

     /**
     * Get the parent imageable model (user or post).
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    // public function getUrlAttribute() {
    //  return asset("images/".$this->attributes['url']);
    // }
}
