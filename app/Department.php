<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['department_name', 'is_billable'];

    protected $table = 'department';

    protected $primaryKey = 'department_id';

    /**
     * A role may be given various permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function designations()
    {
        return $this->belongsToMany(Designation::class);
    }

    /**
     * Grant the given permission to a role.
     *
     * @param  Permission $permission
     *
     * @return mixed
     */
    public function givePermissionTo(Designation $designation)
    {
        return $this->Designation()->save($designation);
    }
}
