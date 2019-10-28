<?php

namespace App\Http\Controllers;

use App\Score;
use App\Course;
use App\Professor;
use App\Assignment;
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
        $assignments = Assignment::join('students','students.id','=','assignments.student_id')
        ->where('course_id','=', $course)->select('assignments.id','students.firstname','students.lastname')->get();


        return view('scores.score')->with('assignments',$assignments)->with('courses',$courses);
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

        for ($i = 0; $i<=count($u1); $i++){
            $score = new score;
            $score->assignment_id = $u1[$i]->assignment_id;
            $score->score = $u1[$i]->score;
            $score->save();
        }

        for ($i = 0; $i<=count($u2); $i++){
            $score = new score;
            $score->assignment_id = $u2[$i]->assignment_id;
            $score->score = $u2[$i]->score;
            $score->save();
        }

        for ($i = 0; $i<=count($u3); $i++){
            $score = new score;
            $score->assignment_id = $u3[$i]->assignment_id;
            $score->score = $u3[$i]->score;
            $score->save();
        }

        for ($i = 0; $i<=count($u4); $i++){
            $score = new score;
            $score->assignment_id = $u4[$i]->assignment_id;
            $score->score = $u4[$i]->score;
            $score->save();
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
