<?php

namespace App\Http\Controllers\Home;

use File;
use Image;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

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

            Image::make($file)->resize(636, 852)->save('upload/about/'.$filename);
            
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

    public function aboutMultiImage(){
        
        return view('admin.about_page.multi_image');
    }

    public function storeMultiImage(Request $request){
        $imgs = $request->file('about_multi_image');

        foreach ($imgs as $multi_img) {
            $filename = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();

            $path = public_path('upload/about/multi');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            Image::make($multi_img->getRealPath())->resize(220, 220)->save('upload/about/multi/'.$filename);
            
            MultiImage::insert([
                'multi_image' => $filename,
                'created_at' => Carbon::now()
            ]);
        }

        $arrNotif = array(
            'message' => 'About Us Multi Image Inserted Sucessfully',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($arrNotif);
        
    }

    public function allMultiImage(){
        //get all data using Eloquent Model
        $aboutMultiImgDatas = MultiImage::all();

        return view('admin.about_page.all_multi_image', compact('aboutMultiImgDatas'));
    }

    public function editMultiImage(MultiImage $multiImage){
        return view('admin.about_page.edit_multi_image', compact('multiImage'));
    }

    public function updateMultiImage(Request $request, MultiImage $multiImage){

        //check and store the image uploaded
        if($request->file('about_multi_image')){
            $multi_img = $request->file('about_multi_image');
            
            $filename = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();

            $path = public_path('upload/about/multi');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }

            Image::make($multi_img->getRealPath())->resize(220, 220)->save('upload/about/multi/'.$filename);

            $formFields['multi_image'] = $filename;
            $multiImage->update($formFields);

            $arrNotif = array(
                'message' => 'About Us Multi Image Updated Sucessfully',
                'alert-type' => 'success'
            );
        }

        $arrNotif = array(
            'message' => 'No Image Selected!',
            'alert-type' => 'success'
        );

        return redirect()->route('about.all.multi.image')->with($arrNotif);
    }

    public function destroyImage(MultiImage $multiImage){
        $path = 'upload/about/multi/';
        $img = $multiImage->multi_image;
        unlink($path.$img);
        $multiImage->delete();

        $arrNotif = array(
            'message' => 'About Us Multi Image Deleted Sucessfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($arrNotif);
    }
}
