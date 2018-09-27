<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // this function is using route-model binding, which is why we don't need to explicitly find the task with Eloquent
    public function show(Task $task) {
        //$task = Task::find($task);
        return view('tasks.show', compact('task'));
    }
}
