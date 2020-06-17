<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use PragmaRX\Countries\Package\Countries;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        
        $countries = Countries::all()->pluck('name.common');
        $user = Auth::user();

        return view('settings.profile', compact('countries','user'));
    }

    public function update(ValidationRequest $request)
    {
        if($request->hasFile('image')) {

            if(Auth::user()->profile) {
                Storage::delete('public/profile-img/'.Auth::user()->profile);
            }

            $profilePic = $request->image->getClientOriginalName();
            $request->image->storeAs('profile-img',$profilePic,'public');
            Auth::user()->update(['profile' => $profilePic]);
        }
      
            Auth::user()->update(['name' => $request->name, 'country' => $request->country, 'dateofbirth' => $request->dateofbirth]);
        
        return redirect()->back();
    }
}
