<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller
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
    public function index()
    {
        $students = Student::all();
        $i = 0;
        return view('home', compact('students', 'i'));
    }

    public function edit($id, Request $request)
    {
        $student = Student::where('id', $id)->first();
        return view('edit', compact('student'));
    }

    public function create()
    {
        return view('add');
    }

    public function view($id)
    {
        $student = Student::where('id', $id)->first();
        return view('view', compact('student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'age' => 'required',

        ]);
    }

    public function delete($id)
    {
    }
}