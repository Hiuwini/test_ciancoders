<?php

namespace App\Http\Controllers;

use App\Score;
use App\Course;
use App\Professor;
use App\Assignment;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
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
        $user = Auth::user();
        
        if($user->rol == 2){
            $professor = Professor::where('user_id','=',$user->id)->get();

            $courses = Course::where('professor_id','=',$professor[0]->id)->get();
        }
        else {
            $courses = Course::all();
        }

        return view('scores.index')->with('courses', $courses);
    }
    public function score($course){
        $courses =  Course::find($course);
        $assignments = Assignment::join('students','students.id','=','assignments.student_id')->orderBy('assignments.id')
        ->where('course_id','=', $course)->select('assignments.id','students.firstname','students.lastname')->get();
        
        $u1 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 1 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();

        $u2 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 2 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();

        $u3 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 3 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();

        $u4 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 4 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();
        return view('scores.score')
            ->with('assignments',$assignments)
            ->with('courses',$courses)
            ->with('u1',$u1)
            ->with('u2',$u2)
            ->with('u3',$u3)
            ->with('u4',$u4);
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
    public function store(Request $request, $u1, $u2, $u3, $u4)
    {
        //
        $u1 = json_decode($u1);
        $u2 = json_decode($u2);
        $u3 = json_decode($u3);
        $u4 = json_decode($u4);

        for ($i = 0; $i<=(count($u1)-1); $i++){
            $score = Score::find($u1[$i]->score_id);
            $score->score = $u1[$i]->score;
            $score->update();
        }

        for ($i = 0; $i<=(count($u2)-1); $i++){
            $score = Score::find($u2[$i]->score_id);
            $score->score = $u2[$i]->score;
            $score->update();
        }

        for ($i = 0; $i<=(count($u3)-1); $i++){
            $score = Score::find($u3[$i]->score_id);
            $score->score = $u3[$i]->score;
            $score->update();
        }

        for ($i = 0; $i<=(count($u4)-1); $i++){
            $score = Score::find($u4[$i]->score_id);
            $score->score = $u4[$i]->score;
            $score->update();
        }
        
        return 'Ready!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
        $user = Auth::user();
        if($user->rol == 3){

            $student = Student::where('user_id','=',$user->id)->get();
            $student_id = $student[0]->id;
            $assignments = Assignment::join('courses','courses.id','=','assignments.course_id')->orderBy('assignments.id')
            ->where('student_id','=', $student[0]->id)->select('assignments.id','courses.name')->get();
            
            $u1 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
            ->whereRaw("scores.unity = 1 and assignments.student_id = $student_id")->select('scores.id','scores.assignment_id','scores.score')->get();
    
            $u2 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
            ->whereRaw("scores.unity = 2 and assignments.student_id = $student_id")->select('scores.id','scores.assignment_id','scores.score')->get();
    
            $u3 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
            ->whereRaw("scores.unity = 3 and assignments.student_id = $student_id ")->select('scores.id','scores.assignment_id','scores.score')->get();
    
            $u4 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
            ->whereRaw("scores.unity = 4 and assignments.student_id = $student_id ")->select('scores.id','scores.assignment_id','scores.score')->get();
            
            return view('scores.student')
                ->with('assignments',$assignments)
                ->with('student',$student)
                ->with('u1',$u1)
                ->with('u2',$u2)
                ->with('u3',$u3)
                ->with('u4',$u4);
        }else if($user->rol == 2){
            $professor = Professor::where('user_id','=',$user->id)->get();

            $courses = Course::where('professor_id','=',$professor[0]->id)->get();
            return view('scores.courses')->with('courses', $courses);
        }
        else {
            $courses = Course::all();
            return view('scores.courses')->with('courses', $courses);
        }

        
    }
    public function course(Score $score)
    {
        //
        $user = Auth::user();
        
        if($user->rol == 2){
            $professor = Professor::where('user_id','=',$user->id)->get();

            $courses = Course::where('professor_id','=',$professor[0]->id)->get();
            return view('scores.course')->with('courses', $courses);
        }
        else {
            $courses = Course::all();
            return view('scores.course')->with('courses', $courses);
        }

        
    }
    public function show_detail($course)
    {
        $courses =  Course::find($course);
        $assignments = Assignment::join('students','students.id','=','assignments.student_id')->orderBy('assignments.id')
        ->where('course_id','=', $course)->select('assignments.id','students.firstname','students.lastname')->get();
        
        $u1 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 1 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();

        $u2 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 2 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();

        $u3 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 3 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();

        $u4 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 4 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();
        
        return view('scores.consult')
            ->with('assignments',$assignments)
            ->with('courses',$courses)
            ->with('u1',$u1)
            ->with('u2',$u2)
            ->with('u3',$u3)
            ->with('u4',$u4);
    }

    public function averages($course)
    {
        $courses =  Course::find($course);
        $assignments = Assignment::join('students','students.id','=','assignments.student_id')->orderBy('assignments.id')
        ->where('course_id','=', $course)->select('assignments.id','students.firstname','students.lastname')->get();
        
        $u1 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 1 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();

        $u2 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 2 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();

        $u3 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 3 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();

        $u4 = Score::join('assignments','assignments.id','=','scores.assignment_id')->orderBy('assignments.id')
        ->whereRaw("scores.unity = 4 and assignments.course_id = $course")->select('scores.id','scores.assignment_id','scores.score')->get();
        
        return view('scores.averages')
            ->with('assignments',$assignments)
            ->with('courses',$courses)
            ->with('u1',$u1)
            ->with('u2',$u2)
            ->with('u3',$u3)
            ->with('u4',$u4);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
