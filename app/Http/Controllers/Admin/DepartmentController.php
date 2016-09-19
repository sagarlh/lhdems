<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Department;
use App\Http\Requests;
use App\Designation;
use App\Http\Controllers\Controller;
use Session;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Department::count();
        $departments = Department::paginate(5);
        
        return view('admin.department.index', compact('departments', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['department_name' => 'required|min:2|unique:department', 'is_billable' => 'required:numeric']);

        Department::create($request->all());

        $page = Department::count()/5;
        $url = '?page='.$page;
        /*if($page > 0)
            $url = '?page='.$page;
        */
        Session::flash('flash_message', 'Department added!');

        return redirect('admin/departments'.$url );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);

        return view('admin.department.show', compact('department'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('admin.department.edit', compact('department'));
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
        $this->validate($request, ['department_name' => 'required|min:2', 'is_billable' => 'required:numeric']);

        $department = Department::findOrFail($id);
        $department->update($request->all());
        /*$page = Department::count()%5;
        $url = '';
        if($page > 0)
            $url = '?page='.$page;*/
        Session::flash('flash_message', 'Role updated!');

        return redirect('admin/departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::destroy($id);

        Session::flash('flash_message', 'Role deleted!');

        return redirect('admin/departments');
    }
}
