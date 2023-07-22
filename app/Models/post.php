<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'status',
        'date_to_publish'
    ];
    public $timestamps = true;

    public function scopeFilter(Builder $builder, $filters) {
        if($filters['search'] ?? false) {
            $builder->where('title','LIKE',"%{$filters['search']}%");
        }
         if($filters['status'] ?? false) {
          $builder->where('status','=',$filters['status']);
        }
    }

    // Relationships get the category from post
    public function category()
    {
    return $this->belongsTo('App\Models\category', 'category_id');
    }

    // Relationships get the tags from post
    public function tags()
    {
        return $this->belongsToMany('App\Models\tag','tag_post_pivot','post_id','tag_id');
    }

    // Relationships get the users from posts
    public function users()
    {
        return $this->belongsToMany('App\Models\User','post_user_pivot','post_id','user_id');
    }

    // Relationships get the user from posts
       public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get the post's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

     // Relationships get the comment from posts
    public function comments() {
        return $this->hasMany(comment::class);
    }

}
