<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $user = User::count();
        $bug = Bug::count();
        $task = Task ::count();
        $users = User::role(['user'])->get();
        return view('admin.dashboard', compact('user', 'bug', 'task', 'users', ));
    }

}
