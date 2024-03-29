<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;



class UserController extends Controller
{
    public function myprofile(Request $request)
    {
        return view('frontend.user.profile');
    }
    public function profileupdate(Request $request)
    {
       $user_id = Auth::user()->id;
       $user = User::findorFail($user_id);


        $user->name = $request->input('fname');
       $user->lname = $request->input('lname');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->pincode = $request->input('pincode');
        $user->phone = $request->input('phone');
        $user->alternate_phone= $request->input('alternate_phone');
        if ($request->hasfile('image'))
        {
            $destination = 'uploads/profile/'.$user->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file =$request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename=time(). '.'.$extension;
            $file->move('uploads/profile/', $filename);
            $user->image =$filename;
        }
        $user->update();
        return redirect()->back()->with('status','Profile Updated');

    }

}
