<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;

use App\Interfaces\AdsInterface;

class ApiController extends Controller
{
    protected $ads;
    public function __construct(AdsInterface $ads) {
        $this->middleware('jwt.auth');
        $this->ads = $ads;
    }

    public function home() {
        $ads = $this->ads->show('mobile-home');
        
        return $ads;
    }

    public function getAd($slug) {
        return $this->ads->findAd($slug);
    }
}
