<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        //get all data using Eloquent Model
        $sliderDatas = Slider::limit(1)->get();
        $sliderData = array();
        if(count($sliderDatas) > 0){
            $sliderData = $sliderDatas[0];
        }
        return view('frontend.index', compact('sliderData'));
    }
}
