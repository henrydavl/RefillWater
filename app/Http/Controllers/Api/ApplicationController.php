<?php

namespace App\Http\Controllers\Api;

use App\Ad;
use App\Gallon;
use App\Http\Resources\AdvertisementResources;
use App\Http\Resources\GallonResources;
use App\Http\Resources\TopUpResources;
use App\TopUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function getGallon() {
        return GallonResources::collection(Gallon::all());
    }

    public function getAds(){
        return AdvertisementResources::collection(Ad::all());
    }

    public function getTopUpHistory(){
        $top = TopUp::all()->where('user_id', Auth::id());
        return TopUpResources::collection($top);
    }
}
