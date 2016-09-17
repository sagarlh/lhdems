<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label'];

    protected $table = 'designation';
    
    /**
     * A permission can be applied to roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function designations()
    {
        return $this->belongsToMany(Department::class);
    }
}
