<?php

namespace ITAIND\HRMSPKG\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use ITAIND\HRMSPKG\Http\Requests\CreateUserRequest;
use ITAIND\HRMSPKG\Models\Department;
use ITAIND\HRMSPKG\Models\User;
use ITAIND\HRMSPKG\Models\UserDepartment;
use ITAIND\HRMSPKG\Models\UserLeaveWallet;
use ITAIND\HRMSPKG\Models\UserDetails;
use Illuminate\Support\Facades\Hash;
use ITAIND\HRMSPKG\Http\Requests\UpdateUserRequest;
use ITAIND\HRMSPKG\Models\Leave;

class UsersController extends Controller
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
        //$users = User::latest()->paginate($perPage);
        $users = User::leftJoin('user_departments', 'user_departments.user_id', '=', 'users.id')
            ->leftJoin('departments', 'user_departments.department_id', '=', 'departments.id')
            ->select(['users.*', 'departments.name as department'])
            ->simplePaginate($perPage);
        //dd($users);

        return view('hrms::users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::pluck('name','id')->all();
        return view('hrms::users.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:300',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required|same:confirm_password',
            'department' => 'required'
        ]);

        $input = Arr::except($request->all(), ['department']);
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        
        //User Department
        UserDepartment::create(['user_id' => $user->id, 'department_id' => $request->department]);
        
        //User Wallet
        $leaves = Leave::all();
        foreach ($leaves as $leave){
            $userLeaveWalletData = ([
                'user_id' => $user->id,
                'leave_id' => $leave->id,
                'total_balance' => $leave->count
            ]);
            $UserLeaveWallet = UserLeaveWallet::create($userLeaveWalletData);
        }
        
        return redirect()->route('users.index')
                        ->with('success','User added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        if (empty($user)) {
            Flash::error(__('User not found'));
            return redirect(route('users.index'));
        }

        return view('hrms::users.show')->with('user', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $userDetails = UserDetails::where('user_id', '=', $id)->first();
        $leaders = User::all()->except($id)->pluck('name','id');
        
        return view('hrms::users.userdetails')->with(['user_details' => $userDetails, 'leaders' => $leaders, 'user_id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => 'required|unique:users,mobile,'.$id,
            'password' => 'same:confirm_password',
            'department' => 'required'
        ]);

        $user = User::find($id);
        
        if (empty($user)) {
            Flash::error(__('User not found'));
            return redirect(route('users.index'));
        }

        $input = Arr::except($request->all(), ['department']);
        
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($request->all(), ['password']);
        }

        $user->update($input);
        if(!empty($request->department)){
            $departmentUsers = UserDepartment::where('user_id', '=', $user->id)->first();
            //dd($departmentUsers);
            if($departmentUsers == null)
                UserDepartment::create(['user_id' => $user->id, 'department_id' => $request->department]);
            else
                $departmentUsers->update(['department_id' => $request->department]);
        }

        $userWalletInfo = UserLeaveWallet::where('user_id', '=', $user->id)->first();
        if($userWalletInfo == null){
            //User Wallet
            $leaves = Leave::all();
            foreach ($leaves as $leave){
                $userLeaveWalletData = ([
                    'user_id' => $user->id,
                    'leave_id' => $leave->id,
                    'total_balance' => $leave->count
                ]);
                $UserLeaveWallet = UserLeaveWallet::create($userLeaveWalletData);
            }
        }
        
        return redirect()->route('users.index')
                        ->with('success','User updated successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $departments = Department::pluck('name','id')->all();
        
        if (empty($user)) {
            Flash::error(__('User not found'));
            return redirect(route('users.index'));
        }

        return view('hrms::users.edit')->with(['user' => $user, 'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userdetails(Request $request, $id)
    {
        $userDetailsInfo = UserDetails::where('user_id', '=', $id)->first();
        $userDetailsData = ([
            'user_id' => $id,
            'designation' => $request->designation,
            'date_of_joining' => $request->date_of_joining,
            'date_of_exist' => $request->date_of_exist,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'reporting_teamleader' => $request->reporting_teamleader
        ]);
        if($userDetailsInfo == null){
            $userDetails = UserDetails::create($userDetailsData);
        } else {
            $userDetails = $userDetailsInfo->update($userDetailsData);
        }
        
        return redirect()->route('users.index')
                        ->with('success','User details added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'Welcome to delete route';
    }
}
