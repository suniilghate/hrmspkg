<?php

namespace ITAIND\HRMSPKG\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'shortform',
        'description',
        'created_by',
        'updated_by'
    ];

    public static $rules = [
        'name' => 'required|string|max:300',
        'created_by' => 'nullable',
        'updated_by' => 'nullable'
    ];

    
}
