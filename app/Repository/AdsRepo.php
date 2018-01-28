<?php
namespace App\Repository;

use App\Interfaces\AdsInterface;

class AdsRepo implements AdsInterface {
    public function store($data) {
        $store;
        try {
            $store = \App\Ads::firstOrCreate($data);
        } catch(\Exception $ex) {
            return $ex;
        }
        return $store;
    }

    public function storeAdsImage($data) {
        $store;
        try {
            $store = \App\AdsImage::firstOrCreate($data);
        } catch(\Exception $ex) {
            return $ex;
        }
        return $store;
    }

    public function findAd($slug) {
        $ad;
        try {
            $ad = \App\Ads::where('slug', $slug)->first();
        } catch(\Exception $ex) {
            return $ex;
        }
        return $ad;
    }

    public function show($id) {
        $ads;
        try {
            if($id == "home") {
                $ads = \App\Ads::latest()->paginate(9);
            } else if ($id == "similar") {
                $ads = \App\Ads::latest()->paginate(4);
            } else if($id == "vue") {
                $ads = \App\Ads::latest()->get();
            }
        } catch(\Exception $ex) {
            return $ex;
        }
        return $ads;
    }

    public function myAds($id) {
        $ads;
        try {
            $ads = \App\Ads::where('user_id', $id)->latest()->paginate(6);
        } catch(\Exception $ex) {
            return $ex;
        }
        return $ads;
    }

    public function search($data) {
        $location    =  $data['location'];
        $state       =  $data['state'];
        $room_type    =  $data['room_type'];
        $min_price    =  $data['min_price'];
        $max_price    =  $data['max_price'];
        $min_bath    =  $data['min_bath'];
        $max_bath    =  $data['max_bath'];
        $min_bed     =  $data['min_bed'];
        $max_bed     =  $data['max_bed'];
        $min_toilet    =  $data['min_toilet'];
        $max_toilet    =  $data['max_toilet'];

        if($data['location']):
            $location_code = 'LIKE';
        else:
            $location_code = '<>';
        endif;

        if($data['state']):
            $state_code = "LIKE";
        else:
            $state_code = "<>";
        endif;
        
        if($data['room_type']):
            $room_code = "LIKE";
        else:
            $room_code = "<>";
        endif;

        $query = \App\Ads::where('exact_location', $location_code, '%' . $data['location'] . '%')
                          ->orWhere('state', $state_code, '%' . $data['state'] . '%')
                          ->orWhere('room_type', $room_code, '%' . $data['room_type'] . '%')
                          ->orWhere('min_rent', '>=', $data['min_price'])
                          ->orWhere('max_rent', '<=', $data['max_price'])
                          ->orWhere('min_bath', '>=', $data['min_bath'])
                          ->orWhere('max_bath', '<=', $data['max_bath'])
                          ->orWhere('min_bed', '>=', $data['min_bed'])
                          ->orWhere('max_bed', '<=', $data['max_bed'])
                          ->orWhere('min_toilet', '>=', $data['min_toilet'])
                          ->orWhere('max_toilet', '<=', $data['max_toilet'])
                          ->paginate(12);
        return $query;
    }

    public function searchHome($data) {
        $query = \App\Ads::Where('exact_location', 'LIKE',  '%' . $data['location'] . '%')
                          ->Where('room_option', $data['room_option'])
                          ->paginate(12);
        return $query;
    }
}