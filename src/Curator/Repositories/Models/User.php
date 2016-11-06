<?php

/*
|--------------------------------------------------------------------------
| Curator: User Model
|--------------------------------------------------------------------------
|
| Curators user model for the User table.
|
*/

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //Mass assignment.
    protected $fillable = [
        'email',
        'username',
        'password',
        'givenName',
        'given_name',
        'family_name',
        'status_id'
    ];

    //The attributes that should be hidden for arrays.
    protected $hidden = [
        'password',
        'remember_token'
    ];

    //Relationship: Each user can have a single Status. One to many.
    public function status()
    {
        return $this->belongsTo('Curator\Repositories\Models\Status', 'status_id');
    }

    //Relationship: Each user can have many activity logs. One to many.
    public function activity()
    {
        return $this->hasMany('Curator\Repositories\Models\Activity');
    }

    //Relationship: Each user can have many flags. Many to many.
    //User belongsToMany Flag as defined by UserFlag with userID and flagID.
    public function flags()
    {
        return $this->belongsToMany('Curator\Repositories\Models\Flag',
                                    'UserFlag');
    }

    //Relationship: Each user can have many roles. Many to many.
    public function roles()
    {
        return $this->belongsToMany('Curator\Repositories\Models\Role',
                                    'UserRole');
    }

    //Relationship: Each user can have many permissions. Many to many.
    public function permissions()
    {
        return $this->belongsToMany('Curator\Models\Permission',
                                    'UserPermission');
    }

    //Mutator: Set the given name with all lowercase letters.
    public function setGivenNameAttribute($value)
    {
        $this->attributes['given_name'] = strtolower($value);
    }

    //Accessor: Return a capitalized given name.
    public function getGivenNameAttribute($value)
    {
        return ucfirst($value);
    }

    //Mutator: Set the family name with all lowercase letters.
    public function setFamilyNameAttribute($value)
    {
        $this->attributes['family_name'] = strtolower($value);
    }

    //Accessor: Return a capitalized family name.
    public function getFamilyNameAttribute($value)
    {
        return ucfirst($value);
    }
}
