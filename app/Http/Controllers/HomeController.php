<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Course;
use App\Student;

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
        $professors = Professor::count();
        $courses = Course::count();
        $students = Student::count();

        return view('starter.dashboardv1')->with('professors', $professors)->with('courses', $courses)->with('students', $students);
    }
}
