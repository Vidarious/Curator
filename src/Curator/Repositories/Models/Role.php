<?php

/*
|--------------------------------------------------------------------------
| Curator: Role Model
|--------------------------------------------------------------------------
|
| Curators role model for the role table.
|
*/

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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

    //Relationship: Roles can be assigned to many users. Many to many.
    public function users()
    {
        return $this->belongsToMany('Curator\Repositories\Models\User', 'UserRole');
    }

    //Relationship: Roles can be assigned to many permissions. Many to many.
    public function permissions()
    {
        return $this->belongsToMany('Curator\Repositories\Models\Permission', 'RolePermission');
    }
}
