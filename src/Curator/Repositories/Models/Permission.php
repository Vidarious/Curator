<?php

/*
|--------------------------------------------------------------------------
| Curator: Permission Model
|--------------------------------------------------------------------------
|
| Curators permission model for the permission table.
|
*/

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //Mass assignment
    protected $fillable = [
        'name',
        'description'
    ];

    //Cast: 'protected' as BOOLEAN.
    protected $casts = [
        'protected',
        'boolean'
    ];

    //Disable timestamps for this model.
    public $timestamps = false;

    //Relationship: Permissions can be assigned to many users. Many to many.
    public function users()
    {
        return $this->belongsToMany('Curator\Repositories\Models\User', 'UserPermission');
    }

    //Relationship: Permissions can be assigned to many roles. Many to many.
    public function roles()
    {
        return $this->belongsToMany('Curator\Repositories\Models\Role', 'RolePermission');
    }
}
