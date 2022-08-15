<?php

namespace App\Http\Controllers\Home;

use App\Models\Home;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class HomeController extends Controller
{
    public function viewSlider(){
        //get all data using Eloquent Model
        $sliderDatas = Slider::all();

        return view('admin.home.slider', compact('sliderDatas'));
    }

    public function storeSlider(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'video_url' => 'required'
        ]);

        //check and store the image uploaded
        if($request->file('slider_image')){
            $file = $request->file('slider_image');
            
            $filename = date('YmdHi').$file->getClientOriginalName();
            $path = public_path('upload/home');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $file->move($path, $filename);
            $formFields['slider_image'] = $filename;
        }

        Slider::create($formFields);

        $arrNotif = array(
            'message' => 'Slider Created Sucessfully',
            'alert-type' => 'success'
        );

        return back()->with($arrNotif);
    }

    public function updateSlider(Request $request, Slider $slider){
        $formFields = $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'video_url' => 'required'
        ]);

        if($request->file('slider_image')){
            $file = $request->file('slider_image');
            
            $filename = date('YmdHi').$file->getClientOriginalName();
            $path = public_path('upload/home');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $file->move($path, $filename);
            $formFields['slider_image'] = $filename;
        }

        $slider->update($formFields);

        $arrNotif = array(
            'message' => 'Slider Updated Sucessfully',
            'alert-type' => 'success'
        );

        return back()->with($arrNotif);
    }
}
