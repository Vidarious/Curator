<?php

/**
 * Curator's eloquent model for the 'permissions' table.
 *
 * Relationships:
 *      permissions => users - Many to many.
 *      permissions => roles - Many to many.
 */

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
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
     * Disable timestamps.
     *
     * @var boolean
     */
    public $timestamps = FALSE;

    /**
     * Create relationship between permissions and users. Many to many.
     *
     * @return object
     */
    public function users()
    {
        return $this->belongsToMany('Curator\Repositories\Models\User', 'UserPermission');
    }

    /**
     * Create relationship between permissions and roles. Many to many.
     * 
     * @return object
     */
    public function roles()
    {
        return $this->belongsToMany('Curator\Repositories\Models\Role', 'RolePermission');
    }
}
