<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        $students = Student::all();
        
        return view('students.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $last_m = Student::latest('id')->first();

        return view('students.create')->with('last_m',$last_m);
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
        ['firstname' => 'required', 
        'lastname' => 'required',
        'password'=> 'required',
        ]);
        $username = $request->firstname.$request->lastname;
        $username = strtolower(str_replace(' ','',$username));

        $user = new User;
        $user->username = $username;
        $user->password = bcrypt($request->password);
        $user->rol = 3;

        $user->save();
    
        $student = new Student;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->matricula = $request->matricula;
        $student->birth_date = date("Y-m-d", strtotime( $request->birth_date ) );
        $student->user_id = $user->id;

        $student->save();

        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student, $id)
    {
        //
        $student = Student::find($id);
        return view('students.update')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $this->validate($request, 
        ['firstname' => 'required', 
        'lastname' => 'required',
        'password'=> 'required',
        ]);
        $student = Student::find($request->id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->birth_date = $request->birth_date;
        
        $student->update();

        $user = User::find($student->user_id);
        $user->password = bcrypt($request->password);
        $user->update();

        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $id)
    {
        //
        $student = Student::find($id);
        $user_id = $student->user_id;
        $student->delete();

        $user = User::find($user_id);
        $user->delete();

        return redirect('/students');
    }
}
