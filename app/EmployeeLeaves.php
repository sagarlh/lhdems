<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeaves extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['emp_id', 'date'];

    protected $table = 'employee_leaves';
}
