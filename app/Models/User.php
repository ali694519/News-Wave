<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_name',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles_name'=>'array'
    ];

      public function scopeFilter(Builder $builder, $filters) {
        if($filters['search'] ?? false) {
            $builder->where('name','LIKE',"%{$filters['search']}%");
        }
         if($filters['status'] ?? false) {
          $builder->where('status','=',$filters['status']);
        }
    }


    // Relationships get the users from posts
    public function posts()
    {
        return $this->belongsToMany('App\Models\post','post_user_pivot','user_id','post_id');
    }

     /**
     * Get the post's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
