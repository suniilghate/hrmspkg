<?php

namespace ITAIND\HRMSPKG\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLeaveWallet extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'leave_id',
        'total_balance',
        'created_by',
        'updated_by'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'leave_id' => 'required',
        'total_balance' => 'required',
        'created_by' => 'nullable',
        'updated_by' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function leave()
    {
        return $this->belongsTo(\ITAIND\HRMSPKG\Models\Leave::class, 'leave_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\ITAIND\HRMSPKG\Models\User::class, 'user_id');
    }
}
