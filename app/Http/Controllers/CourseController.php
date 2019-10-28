<?php

namespace App\Http\Controllers;

use App\Course;
use App\Professor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $courses = Course::join('professors','professors.id','=','courses.professor_id')
        ->select('courses.*','professors.firstname','professors.lastname')->get();
        return view('courses.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $professors = Professor::all();
        return view('courses.create')->with('professors',$professors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, 
        ['name' => 'required', 
        'professor_id' => 'required',
        ]);

        $course = new Course;
        $course->name = $request->name;
        $course->professor_id = $request->professor_id;

        $course->save();

        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, $id)
    {
        //
        $professors = Professor::all();
        $course = Course::find($id);
        return view('courses.update')->with('course', $course)->with('professors',$professors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $this->validate($request, 
        ['name' => 'required', 
        'professor_id' => 'required',
        ]);

        $course = Course::find($request->id);
        $course->name = $request->name;
        $course->professor_id = $request->professor_id;

        $course->save();

        return redirect('/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, $id)
    {
        //
        $course = Course::find($id);
        $course->delete();
        return redirect('/courses');
    }
}
