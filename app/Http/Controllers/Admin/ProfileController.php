<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::findOrFail(Auth::id());
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('admin.profile.index');
    }
    public function show($id)
    {
       
        $user = User::findOrFail($id);
        return view('admin.profile.index',compact('user'));
    }



        }
    
 
