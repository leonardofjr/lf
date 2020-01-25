<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 
        'lname', 
        'email', 
        'password', 
        'bio', 
        'profile_image', 
        'phone', 
        'email', 
        'facebook_url', 
        'linkedin_url', 
        'twitter_url', 
        'github_url', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function portfolio() {
        return $this->hasMany('App\Portfolio', 'user_id');
    }

    public function blog() {
        return $this->hasMany('App\Blog', 'user_id');
    }

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRole($roles) {
        if (is_array($roles)) {
            foreach($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        }
        else {
            if ($this->hasRole($role)) {
                return true;
            }
        return false;
        }
    }

    public function hasRole($role) {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
