<?php

/**
 * Curator's eloquent model for the 'status' table.
 *
 * Relationships:
 *      - status => users - One to many.
 *      - status => activity - Through users.
 */

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Manual table assignment.
     *
     * @var string
     */
    protected $table = 'status';

    /**
     * Disable timestamps.
     *
     * @var boolean
     */
    public $timestamps = FALSE;

    /**
     * Create relationship between status & users table. One to many.
     *
     * @return object
     */
    public function user()
    {
        return $this->hasMany('Curator\Repositories\Models\User');
    }

    /**
     * Create relationship between activity & status tables through users.
     * 
     * @return object
     */
    public function activity()
    {
        return $this->hasManyThrough('Curator\Repositories\Models\Activity',
                                     'Curator\Repositories\Models\User');
    }
}
