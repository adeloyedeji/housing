<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdsComment extends Model
{
    //
    protected $fillable = [
        'user_id', 'ads_id', 'comment'
    ];

    protected $appends = [
        'commentOwner'
    ];

    protected $dates = [
        'created_at'
    ];

    public function getCommentOwnerAttribute() {
        $owner = \App\User::where('id', $this->user_id)->first();

        return $owner;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ad() {
        return $this->belongsTo(Ads::class);
    }
}
