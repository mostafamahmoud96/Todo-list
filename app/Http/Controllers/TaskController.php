<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        $request['user_id']= Auth::user()->id ;
        Task::create($request->validated());


        return redirect()->route('/');
    }
}