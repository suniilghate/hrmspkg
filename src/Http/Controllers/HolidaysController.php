<?php

namespace ITAIND\HRMSPKG\Http\Controllers;

use App\Http\Controllers\Controller;
use ITAIND\HRMSPKG\Models\Holiday;
use Illuminate\Http\Request;
use ITAIND\HRMSPKG\Http\Requests\CreateHolidayRequest;
use ITAIND\HRMSPKG\Http\Requests\UpdateHolidayRequest;

class HolidaysController extends Controller
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
        //$holidays = Holiday::latest()->paginate($perPage);
        $holidays = Holiday::latest()->simplePaginate($perPage);
        return view('hrms::holidays.index')
            ->with('holidays', $holidays);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrms::holidays.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Holiday::create($request->all());

        return redirect()->route('holidays.index')
                        ->with('success','Holiday added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $holiday = Holiday::find($id);
        
        if (empty($holiday)) {
            Flash::error(__('Holiday not found'));
            return redirect(route('holidays.index'));
        }

        return view('hrms::holidays.show')->with('holiday', $holiday);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = Holiday::find($id);
        
        if (empty($holiday)) {
            Flash::error(__('Holiday not found'));
            return redirect(route('holidays.index'));
        }

        return view('hrms::holidays.edit')->with('holiday', $holiday);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateHolidayRequest $request)
    {
        $holiday = Holiday::find($id);

        if (empty($holiday)) {
            Flash::error(__('Holiday not found'));
            return redirect(route('holidays.index'));
        }
        $holiday->update($request->all());
        
        return redirect()->route('holidays.index')
                        ->with('success','Holiday updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holiday $holiday)
    {
        //
    }
}
