<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'emp_id',
    ];

    /**
    * primaryKey
    *
    * @var string
    * @access protected
    */
    //protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     * @access protected
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the employee leaves from employee leave table.
     */
    public function leaves()
    {
        return $this->hasMany('App\EmployeeLeaves', 'emp_id', 'emp_id');
    }
}
