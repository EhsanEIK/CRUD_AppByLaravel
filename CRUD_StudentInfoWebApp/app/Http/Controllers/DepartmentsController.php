<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['departments'] = Department::all();
        return view('departments.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode']     = 'create';
        $this->data['headline'] = 'Create Department';
        $this->data['button']   = 'Save';

        return view('departments.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all(); 

        if(Department::create($formData))
        {
            Session::flash('strong', 'Success!');
            Session::flash('message', 'Department Created Successfully!');
        }
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['department'] = Department::findOrFail($id);

        return view('departments.show', $this->data);
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
        $this->data['headline'] = 'Edit Department Info';
        $this->data['button']   = 'Update';

        $this->data['department'] = Department::findOrFail($id);

        return view('departments.form',$this->data);
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
        $data = $request->all();

        $department             = Department::findOrFail($id);
        $department->name       = $data['name'];
        $department->location   = $data['location'];

        if($department->save())
        {
            Session::flash('strong', 'Update!');
            Session::flash('message', 'Department Updated Successfully!');
        }
        return redirect()->to('departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Department::findorfail($id)->delete())
        {
            Session::flash('strong', 'Delete!');
            Session::flash('message', 'Department Deleted Successfully!');
        }
        return redirect()->to('departments');
    }
}
