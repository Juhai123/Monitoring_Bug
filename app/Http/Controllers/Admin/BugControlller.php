<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BugControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('name');

        $query = Bug::query();

        // if ($filterKeyword) {
        //     $query = $query->where("name", "LIKE", "%$filterKeyword%");
        // }

        $bugs = $query->latest()->paginate(5);
        return view('admin.bug.index', compact('bugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = route('admin.bug.store');
        return view('admin.bug.create', compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'user_id' => 'nullable' ,
            'description' => 'nullable' ,
            'image' => 'image|nullable' ,
           'status' => 'required', 
       ]);
        if ($request->file('image')) {
          $file = $request->file('image')->store('bugs', 'public');
           $data['image'] = $file;
        }

        $bug = Bug::create($data);
        // 1st work
        // activity()->log('Create Bug');
        //2sd work
        activity()->performedOn($bug)->log('Create Bug');
        return redirect()->route('admin.bug.index');

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
        $users = User::role(['user'])->get();
        activity()->performedOn($bug)->log('Show Bug');
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
        $bug = Bug::findOrFail($id);
        activity()->performedOn($bug)->log('Edit Bug');
        return view('admin.bug.edit', compact('bug'));
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
            'name' => 'required|string',
            'description' => 'nullable' ,
            'image' => 'image|nullable' ,
            'status' => 'required',
        ]);
        if ($request->file('image')) {
            $file = $request->file('image')->store('bugs', 'public');
            $data['image'] = $file;
        }
        $bug = Bug::find($id);
        $bug->update($data);
        activity()->performedOn($bug)->log('Update Task');
        return redirect()->route('admin.bug.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bug = Bug::find($id);
        $bug->delete();
        activity()->performedOn($bug)->log('Delete Bug');
        return redirect()->route('admin.bug.index')->with('success', 'Data berhasil dihapus');
    }
}
