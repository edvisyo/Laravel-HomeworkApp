<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
//use App\Statuse;
//use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    { 
        //$statuses = Statuse::all();
        //$tasks = Task::orderBy('created_at', 'desc')->paginate(3);

        if(Request()->has('status_id')) {
            $tasks = Task::with('status')->get();
            $tasks = Task::where('status_id', request('status_id'))->orderBy('created_at', 'desc')->paginate(3)->appends('status_id', request('status_id'));
            // $tasks = Task::orderBy('created_at', 'desc', 'status_id');
        } else {
            $tasks = Task::orderBy('created_at', 'desc')->paginate(3);
        }


        //Gaunam duomenis standartine MySQL uzklausa duomenu filtravimui
        // $tasks1 = DB::select('SELECT * FROM tasks WHERE status_id = 1');

        //$tasks = Task::with('status')->get();
        //$tasks->status_id->name;
        return view('dashboard')->with(compact ('tasks'));

        //return view('dashboard');
    }

    // public function tasks()
    // {   //isrikiuoja uzduociu duomenis nuo seniausio iki naujausio
    //     $tasks = Task::orderBy('created_at', 'desc')->get();
    //     return view('dashboard')->with(compact ('tasks'));
    // }

}
