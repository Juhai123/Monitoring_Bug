<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
 
class UserController extends Controller
{
    public function index(){  
        $users = Task::where('user_id',auth()->user()->id)->get();
        $progress = Bug::where('status', 'ON GOING')->get();
        $pending = Bug::where('status', 'NO SOLVED')->get();
        $solved = Bug::where('status', 'SOLVED')->get();
        return view('user.dashboard', compact('users', 'progress', 'pending', 'solved'));
    }
    
}
