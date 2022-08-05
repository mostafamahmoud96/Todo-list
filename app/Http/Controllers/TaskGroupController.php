<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskGroupRequest;
use App\Models\Task;
use App\Models\TaskGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskGroupController extends Controller
{

    public function index()
    {
        $task_groups = TaskGroup::latest()->paginate(5);

        return view('taskGroup.list', compact('task_groups'));
    }

    public function show()
    {
        return view('taskGroup.show');
    }

    public function create()
    {
        return view('taskGroup.create');
    }

    public function store(TaskGroupRequest $request)
    {
        $attributes = $request->validated();
        $attributes['user_id'] = Auth::user()->id;
        $task_groups = TaskGroup::create($attributes);
        return redirect()->route('taskGroup.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskGroup $task_group)
    {
        return view('taskGroup.edit', compact('task_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskGroupRequest $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task_group = TaskGroup::find($id);
        $task_group->delete();

        return redirect()->route('taskGroup.index')->with('success', 'Task deleted successfully');;

    }
}