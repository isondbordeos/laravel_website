<?php

namespace App\Http\Controllers\Home;

use File;
use App\Models\Home;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class HomeController extends Controller
{
    public function viewSlider(){
        //get all data using Eloquent Model
        $sliderDatas = Slider::limit(1)->get();
        
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
            
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $path = public_path('upload/home');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            Image::make($file)->resize(636, 852)->save('upload/home', $filename);
            
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
            
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $path = public_path('upload/home');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            Image::make($file)->resize(636, 852)->save('upload/home/'.$filename);
            // $save_url = 'upload/home/'.$filename;

            $formFields['slider_image'] = $filename;
        }
        // other way to update but without validation
        // Home::findOrFail($slider)->update([
        //     'title' => $request->title,
        //     'short_title' => $request->short_title,
        //     'slider_image' => $save_url,
        //     'video_url' => $request->video_url
        // ]);

        $slider->update($formFields);

        $arrNotif = array(
            'message' => 'Slider Updated Sucessfully',
            'alert-type' => 'success'
        );

        return back()->with($arrNotif);
    }
}
