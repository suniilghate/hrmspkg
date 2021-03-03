<?php

namespace ITAIND\HRMSPKG\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'designation',
        'date_of_joining',
        'date_of_exist',
        'address',
        'city',
        'state',
        'country',
        'reporting_teamleader',
        'created_by',
        'updated_by'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\ITAIND\HRMSPKG\Models\User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function reporting_teamleader()
    {
        return $this->belongsTo(\ITAIND\HRMSPKG\Models\User::class, 'user_id');
    }
}
