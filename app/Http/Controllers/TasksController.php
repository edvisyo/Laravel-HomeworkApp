<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            //'status_id' => 'required',
            'task_name' => 'required',
            'perform_up_to' => 'required',
            'task_description' => 'required'
        ]);

        //Create Task
        $task = new Task;

        // $task->status_id = $request->input('status_id');
        $default = 1;

        $task->status_id = $default;
        $task->task_name = $request->input('task_name');
        $task->perform_up_to = $request->input('perform_up_to');
        $task->task_description = $request->input('task_description');

        $task->save();

        return redirect('/dashboard')->with('success', 'Nauja užduotis įkelta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->with('task', $task);
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
        $this->validate($request, [
            'status_id' => 'required',
            'task_name' => 'required',
            'perform_up_to' => 'required',
            'task_description' => 'required'
        ]);

        //Create Task
        $task = Task::find($id);
        $task->status_id = $request->input('status_id');
        $task->task_name = $request->input('task_name');
        $task->perform_up_to = $request->input('perform_up_to');
        $task->task_description = $request->input('task_description');

        $task->save();

        return redirect('/dashboard')->with('success', 'Užduotis sėkmingai redaguota!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/dashboard')->with('success', 'Užduotis ištrinta');
    }
}
