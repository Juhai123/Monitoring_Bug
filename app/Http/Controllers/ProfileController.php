<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user= User::findOrFail(Auth::id());
        return view('user.profile.index', compact('user'));
    }

    
    public function store(Request $request, $id){

        // request()->validate([
        //     'old_password' => 'nullable|string',
        //     'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
        // ]);

        // $user = User::find($id);


        // if ($request->filled('old_password')) {
        //     if (Hash::check($request->old_password, $user->password)) {
        //         $user->update([
        //             'password' => Hash::make($request->password)
        //         ]);
        //     } else {
        //         return back()
        //             ->withErrors(['old_password' => __('Please enter the correct password')])
        //             ->withInput();
        //     }
        // }
        

        // $user->save();

        // return back()->with('status', 'Profile updated!');
    //    dd($request->all());
    
        }
    public function update(Request $request, $id){
        // dd($request->all()); 
         $data = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable' ,
            'job' => 'required',
            'image' => 'image|nullable' ,
            'phone' => 'nullable',
            'avatar' => 'nullable',
            'address' => 'nullable',
            'about' => 'nullable',
        ]);
       

        if ($request->file('image')) {
            $file = $request->file('image')->store('users', 'public');
            $data['image'] = $file;
        }

       
        $profile = User::find($id);
        $profile->update($data);
        return redirect()->route('user.profile.index');
    }
    public function show($id)
    {
       
        $user = User::findOrFail($id);
        return view('user.profile.index',compact('user'));
    }



        }
    
 
