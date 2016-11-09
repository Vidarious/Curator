<?php

/**
 * Curator's eloquent model for the 'users' table.
 *
 * Relationships:
 *      users => status - One to many.
 *      users => activity - One to many.
 *      users => flags - Many to many.
 *      users => roles - Many to many.
 *      users => permissions - Many to many.
 */

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $fillable =
    [
        'email',
        'username',
        'password',
        'givenName',
        'given_name',
        'family_name',
        'status_id'
    ];

    /**
     * Hidden attributes.
     *
     * @var array
     */
    protected $hidden =
    [
        'password',
        'remember_token'
    ];

    /**
     * Create relationship between users and status. One to many.
     *
     * @return object
     */
    public function status()
    {
        return $this->belongsTo('Curator\Repositories\Models\Status', 'status_id');
    }

    /**
     * Create relationship between users and activity. One to many.
     *
     * @return object
     */
    public function activity()
    {
        return $this->hasMany('Curator\Repositories\Models\Activity');
    }

    /**
     * Create relationship between users and flags. Many to many.
     *
     * @return object
     */
    public function flags()
    {
        return $this->belongsToMany('Curator\Repositories\Models\Flag',
                                    'UserFlag');
    }

    /**
     * Create relationship between users and roles. Many to many.
     *
     * @return object
     */
    public function roles()
    {
        return $this->belongsToMany('Curator\Repositories\Models\Role',
                                    'UserRole');
    }

    /**
     * Create relationship between users and permissions. Many to many.
     *
     * @return object
     */
    public function permissions()
    {
        return $this->belongsToMany('Curator\Models\Permission',
                                    'UserPermission');
    }

    /**
     * Mutator: Set the given name with all lowercase letters.
     *
     * @return void
     */
    public function setGivenNameAttribute($value)
    {
        $this->attributes['given_name'] = strtolower($value);
    }

    /**
     * Accessor: Return a capitalized given name.
     *
     * @return void
     */
    public function getGivenNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Mutator: Set the family name with all lowercase letters.
     *
     * @return void
     */
    public function setFamilyNameAttribute($value)
    {
        $this->attributes['family_name'] = strtolower($value);
    }

    /**
     * Accessor: Return a capitalized family name.
     * 
     * @return void
     */
    public function getFamilyNameAttribute($value)
    {
        return ucfirst($value);
    }
}
