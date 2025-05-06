<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ilumminate\Support\Facades\Validation;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //This method show the task index page 
    public function index() {
        $tasks=Task::orderBy('created_at','ASC')->get();
        return view('tasks.index',['tasks'=>$tasks]);

    }

    //This method show the task create page 
    public function create() {
        return view('tasks.create');
    }


    //This method store task in database 
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:5|max:255',
            'task' => 'required',
            'status' => 'required',
        ]);  
        
        // add task in the database 
        $task = new Task();
        $task->name = $request->name;
        $task->task = $request->task;
        $task->status = $request->status;
        $task->save(); 

        return redirect()->route('tasks.index')->with('success','Task Added Successfully.!!');
    }

    //This method edit or change a task  
    public function edit($id) {
        $task = Task::findOrFail($id);   
        return view('tasks.edit',['task'=>$task]);
    }

    //This method update a task 
    public function update($id, Request $request) {
        $task = Task::findOrFail($id);
        $validated = $request->validate([
            'name'=>'required|min:5|max:255',
            'task'=>'required',
            'status'=>'required',
        ]);
        

        // update data add in database
        $task->name = $request->name;
        $task->task = $request->task;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('tasks.index')->with('success', 'Task Update Successfully!');

    }

    //This method delete the task  
    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task Delete Successfully!');

    }
}
