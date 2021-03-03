<?php

namespace ITAIND\HRMSPKG\Http\Controllers;

use App\Http\Controllers\Controller;
use ITAIND\HRMSPKG\Models\Leave;
use Illuminate\Http\Request;
use ITAIND\HRMSPKG\Http\Requests\CreateLeaveRequest;
use ITAIND\HRMSPKG\Http\Requests\UpdateLeaveRequest;

class LeavesController extends Controller
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
        $leaves = Leave::latest()->simplePaginate($perPage);
        //dd($leaves);
        return view('hrms::leaves.index')
            ->with('leaves', $leaves);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrms::leaves.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLeaveRequest $request)
    {
        Leave::create($request->all());

        return redirect()->route('leaves.index')
                        ->with('success','Leaves added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = Leave::find($id);
        
        if (empty($leave)) {
            Flash::error(__('Leave not found'));
            return redirect(route('leaves.index'));
        }

        return view('hrms::leaves.show')->with('leave', $leave);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leave::find($id);
        
        if (empty($leave)) {
            Flash::error(__('Leave not found'));
            return redirect(route('leaves.index'));
        }

        return view('hrms::leaves.edit')->with('leave', $leave);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateLeaveRequest $request)
    {
        $leave = Leave::find($id);

        if (empty($leave)) {
            Flash::error(__('Leave not found'));
            return redirect(route('leaves.index'));
        }
        $leave->update($request->all());
        
        return redirect()->route('leaves.index')
                        ->with('success','Leaves updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        return "Welcome to delete action";
    }
}
