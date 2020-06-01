<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('Students.index', ['students' => $students]);
        // return view('Students.index', compact('students')); cara 2   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $student = new Student;
        // $student->nama = $request->nama;
        // $student->nip = $request->nip;                <-- Cara 1
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;

        // $student->save();


        // Student::create([
        //     'nama' => $request->nama,
        //     'nip' => $request->nip,                   <-- cara 2 pake model bikin ( protected $fillable ) cek model.
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan  
        // ]);

        $messages = [
            'nama.required' => 'We need to know your e-mail address!',
        ];
        
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|size:9'
        ]);

        

        Student::create($request->all(), $messages);              //<-- cara 3 paling simple sintax { pake model bikin ( protected $fillable ) cek model.}
        return redirect('/students')->with('status', 'Data Student has ben created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('Students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('Students.edit', ['student' => $student]);
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
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|size:9',
            'email' => 'required',
            'jurusan' => 'required'
        ]);

        Student::where('id', $student->id)
                ->update([
                    'nama' => $request->nama,
                    'nip' => $request->nip,
                    'email' => $request->email,
                    'jurusan' => $request->jurusan
                ]);
                return redirect('/students')->with('status', 'Data Student has ben Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'Data Student has ben delete!');
    }
}
