<?php

namespace App\Http\Controllers;

use App\Models\Student;
use PDF;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['students'] = Student::all();
        return view('students.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode']     = 'create';
        $this->data['headline'] = 'Create Student';
        $this->data['button']   = 'Save';

        $this->data['departments'] = Department::arrayForSelect();

        return view('students.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $formData = $request->all(); 

        if ($request->file('imgPath') == null) {
            $file = "";
        }
        else{
            $formData['imgPath'] = $request->file('imgPath')->store('images','public');
        }

        if(Student::create($formData))
        {
            Session::flash('strong', 'Success!');
            Session::flash('message', 'Student Created Successfully!');
        }
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['student'] = Student::findOrFail($id);

        $this->data['url'] = asset(storage::url($this->data['student']->imgPath));

        return view('students.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['mode']     = 'edit';
        $this->data['headline'] = 'Edit Student Info';
        $this->data['button']   = 'Update';

        $this->data['departments'] = Department::arrayForSelect();
        $this->data['student'] = Student::findOrFail($id);
        $this->data['url'] = asset(storage::url($this->data['student']->imgPath));

        return view('students.form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data       = $request->all();

        $student    = Student::findOrfail($id);

        $student->department_id      = $data['department_id'];
        $student->name               = $data['name'];
        $student->roll               = $data['roll'];
        $student->email              = $data['email'];
        $student->phone              = $data['phone'];
        $student->address            = $data['address'];
        
        if ($request->file('imgPath') == null) {
            $file = "";
        }
        else{
            $student->imgPath   = $request->file('imgPath')->store('images','public');
            Storage::disk('public')->delete(Student::findorfail($id)->imgPath);
        }        

        if($student->save())
        {
            Session::flash('strong', 'Update!');
            Session::flash('message', 'Student Updated Successfully!');
        }
        return redirect()->to('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::disk('public')->delete(Student::findorfail($id)->imgPath);
        if(Student::findorfail($id)->delete())
        {
            Session::flash('strong', 'Delete!');
            Session::flash('message', 'Student Deleted Successfully!');
        }
        return redirect()->to('students');
        
    }

    //for generate PDF student list
    public function PDF()
    {
        $this->data['students'] = Student::all();
        $pdf = PDF::loadView('students.pdf',$this->data);
        return $pdf->stream('student list.pdf');
    }
}
