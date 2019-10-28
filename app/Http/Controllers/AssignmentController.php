<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\Student;
use Illuminate\Http\Request;

class AssignmentController extends Controller
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
        return view('assignments.index')->with('courses',$courses);
    }

    public function assignment($course)
    {
        $courses = Course::find($course);
        $assign = Assignment::join('students','students.id','=','assignments.student_id')
        ->where('assignments.course_id','=',$course)
        ->select('assignments.*','students.firstname','students.lastname','students.matricula')->get();
        $ids = array();
        foreach($assign as $a){
            array_push($ids, $a->student_id);
        }

        $all = Student::whereNotIn('id',$ids)->get();

        return view('assignments.assign')->with('courses',$courses)->with('assign',$assign)->with('all',$all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ids)
    {
        //
        $ids = json_decode($ids);

        $course_id = $ids[0];
        
        for ($i = 1; $i<=( count($ids) -1 ); $i++){
            $assign = new Assignment;
            $assign->course_id = $course_id;
            $assign->student_id = $ids[$i];
            $assign->save();
        }

        return "Ready!";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment, $id, $course)
    {
        //
        $assign = Assignment::find($id);
        $assign->delete();

        return redirect("/assignments/$course");
    }
}
