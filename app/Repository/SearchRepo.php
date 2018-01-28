<?php

namespace App\Repository;

use App\Interfaces\SearchInterface;

class SearchRepo implements SearchInterface {
    public function search($id) {
        $result;
        try {
            if($id == "welcome") {
                $result = \App\Ads::latest()->paginate(4);
            }
        } catch(\Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function getUsers($id) {
        $users;
        try {
            if($id == "welcome") {
                $users = \App\User::latest()->paginate(4);
            }
        } catch(\Exception $ex) {
            return $ex;
        }
        return $users;
    }

    public function find($id) {
        $ads;
        try {
            $ads = \App\Ads::where('exact_location', 'like',  '%' . $id  .'%')->paginate(5);
        } catch(\Exception $ex) {
            return $ex;
        }
        return $ads;
    }
}