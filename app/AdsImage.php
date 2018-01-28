<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdsImage extends Model
{
    //
    protected $fillable = [
        'adid', 'image'
    ];

    public function ads() {
        return $this->belongsTo(Ads::class);
    }
}
