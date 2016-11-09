<?php

/**
 * Curator's eloquent model for the 'settings' table.
 *
 * Relationships: settings => roles - Many to many.
 */

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $fillable =
    [
        'login_method',
        'remember_me',
        'login_throttling',
        'login_throttling_attempts',
        'login_throttling_lockout',
        'user_idle_time',
        'default_role_id',
        'login_page'
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
        'remember_me'      => 'boolean',
        'login_throttling' => 'boolean'
    ];

    /**
     * Create relationship between settings and roles. One to one.
     * 
     * @return object
     */
    public function role()
    {
        return $this->hasOne('Curator\Repositores\Models\Role', NULL, 'default_role_id');
    }
}
