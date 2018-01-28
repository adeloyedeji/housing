<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountActivation extends Model
{
    //
    protected $fillable = [
        'user_id', 'activation_code', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
