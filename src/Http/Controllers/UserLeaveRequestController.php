<?php

namespace ITAIND\HRMSPKG\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ITAIND\HRMSPKG\Http\Requests\CreateUserLeaveRequest;
use ITAIND\HRMSPKG\Models\Leave;
use ITAIND\HRMSPKG\Models\UserLeaveWallet;
use Illuminate\Support\Facades\Auth;
use ITAIND\HRMSPKG\Models\UserLeaveRequest;
use ITAIND\HRMSPKG\Models\UserTransaction;
use Illuminate\Support\Facades\DB;

//use Flash;

class UserLeaveRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        /*
        $leaves = UserLeaveWallet::leftJoin('user_leave_wallets', 'user_leave_wallets.user_id', '=', Auth::id())
              ->leftJoin('leaves', 'user_leave_wallets.leave_id', '=', 'leaves.id')
              ->select(['user_leave_wallets.total_balance', 'leaves.shortform', 'leaves.count as totalleaves']);
        */      
        $leaves = Leave::pluck('name','id')->all();    
        
        return view('hrms::userleaves.create', compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(CreateUserLeaveRequest $request)
    {
        //print '<pre/>'; print_r($_POST); //exit;
        $leaveTypesId = implode(',', array_map(function($value){
            return trim($value['leave_type'], ',');
        }, $request->leaveData));
        $leaveTypesCount = array_map(function($value){
            return $value['leave_type_count'];
        }, $request->leaveData);
        
        //Check for the leaves balance from Users Leave-Wallet
        $userWallet = UserLeaveWallet::where([['user_id', '=', Auth::id()]])
            ->whereIn('leave_id', explode(',', $leaveTypesId))
            ->get();
        
        //dd($leaveTypesCount); 
        try {
            // Begin a transaction
            DB::beginTransaction();
            $UserLeaveRequest = UserLeaveRequest::create([
                'user_id' => Auth::id(),
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'reason' => $request->reason
            ]);
            foreach ($request->leaveData as $key => $leave){
                if($userWallet[$key]->total_balance >= $leaveTypesCount[$key]){
                    $UserLeaveTransaction = UserTransaction::create([
                        'user_id' => Auth::id(),
                        'request_id' => $UserLeaveRequest->id,
                        'leave_id' => $leave['leave_type'],
                        'count' => (float) $leave['leave_type_count']
                    ]);
                    if($userWallet[$key]->leave_id == $leave['leave_type']){
                        $userWallet[$key]->update(['user_id' => Auth::id(),
                            'leave_id' => $leave['leave_type'],
                            'total_balance' => $userWallet[$key]->total_balance - $leave['leave_type_count']  
                        ]);
                    }
                } else {
                    DB::rollback();
                    //Flash::error(__('Leave Not Allowed. Your leave balance is exhausted'));
                    //return redirect(route('userleaves.create'));
                    return redirect(url('userleaves/create'));
                }    
            }
            // Commit the transaction
            DB::commit();
            
            return redirect()->route('users.index')
                        ->with('success','Leave Request added successfully.');
        } catch (\Exception $e) {
            // An error occured; cancel the transaction...
            DB::rollback();
            // and throw the error again.
            throw $e;
        }
    }
}
