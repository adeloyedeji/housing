<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'gender', 'username', 'image'
    ];

    public $with = [
        'profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function social() {
        return $this->hasOne(Social::class);
    }

    public function activation() {
        return $this->hasOne(AccountActivation::class);
    }

    public function ads() {
        return $this->hasMany(Ads::class);
    }

    public function adsComment() {
        return $this->hasMany(AdsComment::class);
    }

    public function adNotification() {
        return $this->hasMany(AdNotification::class);
    }
}
