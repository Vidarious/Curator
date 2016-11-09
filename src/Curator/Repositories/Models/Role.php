<?php

/**
 * Curator's eloquent model for the 'roles' table.
 *
 * Relationships:
 *      roles => users - Many to many.
 *      roles => permissions - Many to many.
 */

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $fillable =
    [
        'name',
        'description'
    ];

    /**
     * Disable timestamps.
     *
     * @var boolean
     */
    public $timestamps = FALSE;

    /**
     * Column data casting.
     *
     * @var array
     */
    protected $casts =
    [
        'protected',
        'boolean'
    ];

    /**
     * Create relationship between roles and users. Many to many.
     *
     * @return object
     */
    public function users()
    {
        return $this->belongsToMany('Curator\Repositories\Models\User', 'UserRole');
    }

    /**
     * Create relationship between roles and permission. Many to many.
     * 
     * @return object
     */
    public function permissions()
    {
        return $this->belongsToMany('Curator\Repositories\Models\Permission', 'RolePermission');
    }
}
