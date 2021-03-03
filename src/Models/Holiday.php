<?php

namespace ITAIND\HRMSPKG\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'created_by',
        'updated_by'
    ];

    public static $rules = [
        'name' => 'required|string|max:300',
        'start_date' => 'required',
        'end_date' => 'required',
        'created_by' => 'nullable',
        'updated_by' => 'nullable'
    ];
}
