<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @29 #relationship
     * Name of the method matters! It's articles because it referrs to the Model Article and a User has many Articles.
     * If you want to rename this method, give he name for the foreign key as a second argument for hasMany.
     */
    public function articles()
    {
        // With time stamps is optional, it says to add a time stamp
        return $this->hasMany(Article::class)->withTimestamps();
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
