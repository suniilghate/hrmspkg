<?php

namespace ITAIND\HRMSPKG\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use ITAIND\HRMSPKG\Models\Department;
use ITAIND\HRMSPKG\Models\UserDepartment;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        /*'name' => 'required|string|max:300',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirm_password',
        'mobile' => 'required',
        'created_by' => 'nullable',
        'updated_by' => 'nullable'*/
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userDepartments()
    {
        return $this->hasMany(\ITAIND\HRMSPKG\Models\UserDepartment::class, 'department_id');
    }
}
