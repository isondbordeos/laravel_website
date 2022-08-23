<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\MultiImage;
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

        //get all data using Eloquent Model
        $aboutDatas = About::limit(1)->get();
        $aboutData = array();
        if(count($aboutDatas) > 0){
            $aboutData = $aboutDatas[0];
        }

        //get all data using Eloquent Model
        $multiImgData = MultiImage::all();

        return view('frontend.index', compact('sliderData', 'aboutData', 'multiImgData'));
    }

    public function aboutus(){
        //get all data using Eloquent Model
        $aboutDatas = About::limit(1)->get();
        $aboutData = array();
        if(count($aboutDatas) > 0){
            $aboutData = $aboutDatas[0];
        }

        $multiImgData = MultiImage::all();

        return view('frontend.about_us', compact('aboutData', 'multiImgData'));
    }
}
