<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    //
    protected $fillable = [
        'user_id',  'title', 'slug', 'description', 'state', 'area', 'exact_location',  'move_on', 'room_type',   'total_units', 'ad_contact', 'min_rent', 'max_rent', 'min_bed', 'max_bed', 'min_toilet', 'max_toilet', 'min_bath', 'max_bath', 
    ];

    protected $appends = [
        'areaOwner', 'adsImage', 'adsComment', 'adOwner'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function getAreaOwnerAttribute() {
        $area = \App\Area::where('id', $this->area)->first();

        return $area;
    }

    public function getAdsImageAttribute() {
        $ad_image = \App\AdsImage::where('adid', $this->id)->get();

        return $ad_image;
    }

    public function getAdsCommentAttribute() {
        $comments = \App\AdsComment::where('id', $this->id)->get();

        return $comments;
    }

    public function getAdOwnerAttribute() {
        return \App\User::find($this->user_id);
    }

    public function adImage() {
        return $this->hasMany(AdsImage::class, 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function adComment() {
        return $this->hasMany(AdsComment::class);
    }
}