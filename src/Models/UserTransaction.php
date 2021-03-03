<?php

namespace ITAIND\HRMSPKG\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'request_id',
        'leave_id',
        'count',
        'created_by',
        'updated_by'
    ];
}
