<?php

namespace App\Http\Controllers;

use App\Professor;
use App\User;
use Illuminate\Http\Request;

class ProfessorController extends Controller
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
        $professors = Professor::all();
        return view('professors.index')->with('professors',$professors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('professors.create');
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
        $user->rol = 2;

        $user->save();
    
        $professor = new Professor;
        $professor->firstname = $request->firstname;
        $professor->lastname = $request->lastname;
        $professor->user_id = $user->id;

        $professor->save();

        return redirect('/professors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor, $id)
    {
        //
        $professor = Professor::find($id);
        return view('professors.update')->with('professor',$professor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        //
        $this->validate($request, 
        ['firstname' => 'required', 
        'lastname' => 'required',
        'password'=> 'required',
        ]);
        $professor = Professor::find($request->id);
        $professor->firstname = $request->firstname;
        $professor->lastname = $request->lastname;
        
        $professor->update();

        $user = User::find($professor->user_id);
        $user->password = bcrypt($request->password);
        $user->update();

        return redirect('/professors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor, $id)
    {
        //
        $professor = Professor::find($id);
        $user_id = $professor->user_id;
        $professor->delete();

        $user = User::find($user_id);
        $user->delete();

        return redirect('/professors');
    }
}
