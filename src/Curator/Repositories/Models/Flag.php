<?php

/**
 * Curator's eloquent model for the 'flags' table.
 *
 * Relationships: flags => users - Many to many.
 */

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Disable timestamps.
     *
     * @var boolean
     */
    public $timestamps = FALSE;

    /**
     * Create relationship between flags and users. Many to many.
     * 
     * @return object
     */
    public function users()
    {
        return $this->belongsToMany('Curator\Models\Repositories\User', 'UserFlag');
    }
}
