<?php

namespace ITAIND\HRMSPKG\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'shortform',
        'description',
        'count',
        'created_by',
        'updated_by'
    ];

    public static $rules = [
        'name' => 'required|string|max:300',
        'count' => 'required',
        'created_by' => 'nullable',
        'updated_by' => 'nullable'
    ];
}
