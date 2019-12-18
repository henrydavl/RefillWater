<?php

namespace App\Http\Controllers\Api;

use App\Ad;
use App\Bottle;
use App\Gallon;
use App\Http\Resources\AdvertisementResources;
use App\Http\Resources\DummyResource;
use App\Http\Resources\GallonResources;
use App\Http\Resources\SpecificGallon;
use App\Http\Resources\TopUpResources;
use App\TopUp;
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

    public function specific(Gallon $gallon) {
        return new SpecificGallon($gallon);
    }

    public function bottle(){
        $bottle = Bottle::where(function ($q){
            $q->where('user_id', 17)->orWhere('user_id', 15)->groupBy('user_id');
        })->get();
        return DummyResource::collection($bottle);
    }

    public function statusGallon($id, $done) {
        $gallon = Gallon::find($id);
        if ($done == 1) {
            if ($gallon == null) {
                return response([
                    'message' => 'not found'
                ]);
            } else {
                $gallon->update([
                    'is_on' => '1',
                    'current_request' => null,
                ]);

                return response([
                    'message' => 'complete'
                ]);
            }
        } else if ($done != 0){
            if ($gallon->current_request == null){
                $gallon->update([
                    'is_on' => '0',
                    'current_request' => 600,
                ]);
                return response([
                    'message' => 'updated'
                ]);
            } else {
                return response([
                    'message' => 'unavailable'
                ]);
            }
        } else {
            return response([
                'message' => 'error'
            ]);
        }
    }
}
