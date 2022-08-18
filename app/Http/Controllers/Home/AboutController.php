<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Image;

class AboutController extends Controller
{
    public function viewAboutUs(){
        //get all data using Eloquent Model
        $aboutDatas = About::limit(1)->get();
        
        return view('admin.home.about_us', compact('aboutDatas'));
    }

    public function storeAboutUs(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required'
        ]);

        //check and store the image uploaded
        if($request->file('about_img')){
            $file = $request->file('about_img');
            
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $path = public_path('upload/about');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            Image::make($file)->resize(636, 852)->save('upload/about', $filename);
            
            $formFields['about_img'] = $filename;
        }

        About::create($formFields);

        $arrNotif = array(
            'message' => 'About Us Created Sucessfully',
            'alert-type' => 'success'
        );

        return back()->with($arrNotif);
    }

    public function updateAboutUs(Request $request, about $about){
        $formFields = $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required'
        ]);

        if($request->file('about_img')){
            $file = $request->file('about_img');
            
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $path = public_path('upload/about');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            Image::make($file)->resize(636, 852)->save('upload/about/'.$filename);
            // $save_url = 'upload/about/'.$filename;

            $formFields['about_img'] = $filename;
        }
        // other way to update but without validation
        // Home::findOrFail($about)->update([
        //     'title' => $request->title,
        //     'short_title' => $request->short_title,
        //     'about_img' => $save_url,
        //     'video_url' => $request->video_url
        // ]);

        $about->update($formFields);

        $arrNotif = array(
            'message' => 'About Us Updated Sucessfully',
            'alert-type' => 'success'
        );

        return back()->with($arrNotif);
    }
}
