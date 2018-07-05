<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'birthday', 'phone1', 'phone2', 'marital_status', 'current_address', 'city', 'state_id', 'country_id', 'about', 'online_status'
    ];

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function state() {
        return $this->hasOne(State::class);
    }

    public function country() {
        return $this->hasOne(Country::class);
    }
}
