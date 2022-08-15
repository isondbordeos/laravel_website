<?php

namespace App\Http\Controllers;

use File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.profile', compact('adminData'));
    }

    public function edit(){
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.edit', compact('editData'));
    }

    public function update(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            
            $filename = date('YmdHi').$file->getClientOriginalName();
            $path = public_path('upload/admin_images');
            if(!File::isDirectory($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $file->move($path, $filename);
            $data->profile_image = $filename;
        }

        $data->save();

        $arrNotif = array(
            'message' => 'User Updated Sucessfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($arrNotif);
    }

    public function changePassword(){
        return view('admin.change_password');
    }

    public function updatePassword(Request $request){
        $validateData = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'confirmationPassword' => 'required|same:newPassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->currentPassword, $hashedPassword)) {
            $userData = User::find(Auth::user()->id);
            $userData->password = bcrypt($request->newPassword);
            $userData->save();
            session()->flash('message', 'Password Updated Sucessfuly');
            return redirect()->back();
        }
        else{
            session()->flash('message', 'Old Password Doesn\'t Match');
            return redirect()->back();
        }

    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $arrNotif = array(
            'message' => 'User Logged Out Sucessfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($arrNotif);
    }
}
