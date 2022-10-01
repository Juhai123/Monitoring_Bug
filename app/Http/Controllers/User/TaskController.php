<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Task;
use Illuminate\Http\Request;
 
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $filterKeyword = $request->get('user_id');

        // dd($filterKeyword);
        $query = Task::query();
        $tasks = Task::where('user_id',auth()->user()->id)->paginate(5);
        // dd($tasks);
        // if ($filterKeyword) {
        //     $query = $query->where("user_id", "LIKE", "%$filterKeyword%");
        // }

        // $tasks = $query->paginate(5);
        return view ('user.task.index' , compact('tasks'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bug = Bug::findOrFail($id);
        $task = $bug->task;
        $url = route('admin.task.store');
        return view('admin.bug.show', ['bug' => $bug, 'task' => $task], compact('url', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'description' => 'nullable' ,
            'status' =>'required',
            'start' => 'required', 
            'end' => 'required', 
        ]);
       
        $task = Task::find($id);
        $task->update($data);
        return redirect()->route('user.task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
