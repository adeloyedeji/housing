<?php

namespace App\Helpers;

class Utility {
    public static function getArea($id) {
        $area;
        try {
            if($id == 'all') {
                $area = \App\Area::all();
            } else if($id == 'p') {
                $area = \App\Area::paginate(10);
            } else {
                $area = \App\Area::where('state_id', $id)->get();
            }
        } catch(\Exception $ex) {
            return $ex;
        }
        return $area;
    }
    public static function getState($id) {
        $state;
        try {
            if($id == 'all') {
                $state = \App\State::all();
            } else if($id == 'p') {
                $state = \App\State::paginate(10);
            } else {
                $state = \App\State::where('id', $id)->first();
            }
        } catch(\Exception $ex) {
            return $ex;
        }
        return $state;
    }  

    public static function getCountry($id) {
        $country;
        try {
            if($id == 'all') {
                $country = \App\Country::all();
            } else if($id == 'p') {
                $country = \App\Country::paginate(10);
            } else {
                $country = \App\Country::where('id', $id)->first();
            }
        } catch(\Exception $ex) {
            return $ex;
        }
        return $country;
    } 

    public static function short_description($str) {
        $short = substr($str, 0, 100);
        if(strlen($str) > 100):
            $short = substr($str, 0, 100) . "...";
        endif;
        return $short;
    }

    public static function short_title($str) {
        $short = substr($str, 0, 17);
        if(strlen($str) > 17):
            $short = substr($str, 0, 17) . "...";
        endif;
        return $short;
    }
}