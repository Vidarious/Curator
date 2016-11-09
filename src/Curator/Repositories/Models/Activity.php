<?php

/**
 * Curator's eloquent model for the 'activity' table.
 *
 * Relationships: activity => users - One to many.
 */

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $fillable =
    [
        'user_id',
        'action',
        'ip_address'
    ];

    /**
     * Manual table assignment.
     *
     * @var string
     */
    protected $table = 'activity';

    /**
     * Create relationship between activity & users table. One to many.
     *
     * @return object
     */
    public function user()
    {
        return $this->belongsTo('Curator\Repositories\Models\User');
    }
}
