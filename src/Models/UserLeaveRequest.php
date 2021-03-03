<?php

namespace ITAIND\HRMSPKG\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLeaveRequest extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'reason',
        'created_by',
        'updated_by'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'start_date' => 'required',
        'end_date' => 'required',
        'created_by' => 'nullable',
        'updated_by' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\ITAIND\HRMSPKG\Models\User::class, 'user_id');
    }
}
