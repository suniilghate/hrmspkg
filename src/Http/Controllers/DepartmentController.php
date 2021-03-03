<?php

namespace ITAIND\HRMSPKG\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ITAIND\HRMSPKG\Models\Department;
use ITAIND\HRMSPKG\Http\Requests\CreateDepartmentRequest;
use ITAIND\HRMSPKG\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = (env('PAGINATION')) ? env('PAGINATION') : 10;
        $departments = Department::latest()->simplePaginate($perPage);
        return view('hrms::departments.index')
            ->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrms::departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDepartmentRequest $request)
    {
        Department::create($request->all());

        return redirect()->route('departments.index')
                        ->with('success','Department added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);
        
        if (empty($department)) {
            Flash::error(__('Department not found'));
            return redirect(route('departments.index'));
        }

        return view('hrms::departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        
        if (empty($department)) {
            Flash::error(__('Department not found'));
            return redirect(route('departments.index'));
        }

        return view('hrms::departments.edit')->with('department', $department);
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
        $department = Department::find($id);

        if (empty($department)) {
            Flash::error(__('Department not found'));
            return redirect(route('departments.index'));
        }
        $department->update($request->all());
        
        return redirect()->route('departments.index')
                        ->with('success','Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Welcome to delete action";
    }
}
