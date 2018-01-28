<?php

namespace App\Repository;

use App\Interfaces\AdsCommentInterface;

class AdsCommentRepo implements AdsCommentInterface {
    public function store($data) {
        $store;
        try {
            $store = \App\AdsComment::firstOrCreate($data);
        } catch(\Exception $ex) {
            return $ex;
        }
        return $store;
    }
}