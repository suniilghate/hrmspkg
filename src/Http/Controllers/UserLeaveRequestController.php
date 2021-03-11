<?php

namespace ITAIND\HRMSPKG\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ITAIND\HRMSPKG\Http\Requests\CreateUserLeaveRequest;
use ITAIND\HRMSPKG\Models\Leave;
use ITAIND\HRMSPKG\Models\User;
use ITAIND\HRMSPKG\Models\UserLeaveWallet;
use Illuminate\Support\Facades\Auth;
use ITAIND\HRMSPKG\Models\UserLeaveRequest;
use ITAIND\HRMSPKG\Models\UserTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notification;
use ITAIND\HRMSPKG\Models\UserDetails;
use ITAIND\HRMSPKG\Notifications\LeavesNotification;

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

    public function myleaves($id = null) {
        $perPage = (env('PAGINATION')) ? env('PAGINATION') : 10;
        $myLeaves = UserLeaveRequest::where('user_id', '=', Auth::id())
                        ->simplePaginate($perPage);
        return view('hrms::userleaves.myleaves', compact('myLeaves'));
    }

    public function myleaves_details($id = null) {
        $myLeaveDetails = UserLeaveRequest::find($id);
        return view('hrms::userleaves.myleaves-details', compact('myLeaveDetails'));
    }

    public function balance_leaves(){
        $myLeavesBalance = UserLeaveWallet::leftJoin('leaves', 'user_leave_wallets.leave_id', '=', 'leaves.id')
                ->where('user_leave_wallets.user_id', '=', Auth::id())
                ->select(['user_leave_wallets.total_balance', 'leaves.shortform'])->get();
        return view('hrms::userleaves.myleaves-balance', compact('myLeavesBalance'));
    }

    public function pendingleaves(){
        $pendingLeaves = UserLeaveRequest::join('users', 'user_leave_requests.user_id', '=', 'users.id')
                        ->join('user_transactions', 'user_leave_requests.id', '=', 'user_transactions.request_id')
                        ->where('user_leave_requests.status', '=', 1)
                        ->select(['users.name', DB::raw("count(user_transactions.count) as total"), 'user_leave_requests.start_date', 'user_leave_requests.end_date', 'user_leave_requests.status'])
                        ->groupBy(['user_transactions.user_id'])
                        ->get();
        dd($pendingLeaves);                

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(CreateUserLeaveRequest $request)
    {
        //print '<pre/>'; //print_r($_POST); //exit;
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
                        $userWallet[$key]->update([
                            'user_id' => Auth::id(),
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
            
            //Notify User for leave
            $userInfo = User::find(Auth::id());
            $userInfoData = [
                'name' => 'Dear ' . $userInfo->name . ',',
                'body' => 'You have applied a leave from ' . $request->start_date . ' to ' . $request->end_date . '. We have notified your manager about your leave.',
                'thanks' => 'Thank you',
                'leaveText' => 'Check your leave status here',
                'leaveUrl' => url('userleaves/myleaves/' . $UserLeaveRequest->id),
                'leave_id' => $UserLeaveRequest->id
            ];
            $userInfo->notify(new LeavesNotification($userInfoData));

            //Notify Team leader for leave
            $userLeaderId = UserDetails::where([['user_id', '=', Auth::id()]])->select('user_details.reporting_teamleader as teamleader')->first()->toArray();
            $leaderInfo = User::find($userLeaderId['teamleader']);
            $leaderInfoData = [
                'name' => 'Dear ' . $leaderInfo->name . ',',
                'body' => 'You have recieved a leave request from your team member and pending for your approval. Please take an action on his leave.',
                'thanks' => 'Thank you',
                'leaveText' => 'To approve/reject the leave click here',
                'leaveUrl' => url('userleaves/pendingleaves/'),
                'leave_id' => $UserLeaveRequest->id
            ];
            $leaderInfo->notify(new LeavesNotification($leaderInfoData));

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
