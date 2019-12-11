<?php

namespace App\Http\Controllers\Api;

use App\Ad;
use App\Gallon;
use App\Http\Resources\AdvertisementResources;
use App\Http\Resources\GallonResources;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function getGallon() {
        return GallonResources::collection(Gallon::all());
    }

    public function getAds(){
        return AdvertisementResources::collection(Ad::all());
    }

    public function getTopUpHistory(){

    }


}
