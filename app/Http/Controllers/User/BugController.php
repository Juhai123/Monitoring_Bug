<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BugController extends Controller
{
    public function index()
    {
        $bugs = Bug::all();
        $tasks = Task::all();
        return view('user.bug.index', compact('bugs', 'tasks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'image' => 'image|nullable',
            'status' => 'required',
        ]);
        if ($request->file('image')) {
            $file = $request->file('image')->store('bugs', 'public');
            $data['image'] = $file;
        }


        Bug::create($data);
        return redirect()->route('user.bug.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bug = \App\Models\Bug::findOrFail($id);

        
        $comments = $bug->comments->load('comments')  ;
        // return response()->json($comments);
        $tasks = Task::where('user_id','bug_id')->get();
        $task = Auth::user()->name;
        $users = User::role(['user'])->get();
      
        return view('user.bug.show', ['bug' => $bug], compact('comments', 'task'));

       
    }
}
