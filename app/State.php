<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $fillable = [
        'state', 'capital'
    ];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
