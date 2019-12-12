<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //return view('pages.index', compact('title'));

        $title = 'Sveiki atvykę į užduočių planuoklį!';
        return view('pages.index')->with('title', $title);
    }

    public function task()
    {   
        return view('pages.new');
    }

}
