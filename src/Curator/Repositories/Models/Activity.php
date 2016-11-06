<?php

/*
|--------------------------------------------------------------------------
| Curator: Activity Model
|--------------------------------------------------------------------------
|
| Curators activity model for the Activity table.
|
*/

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //Mass assignment.
    protected $fillable = [
        'user_id',
        'action',
        'ip_address'
    ];

    //Use a specific table name.
    protected $table = 'activity';

    //Relationship: Each activity is assigned to one user. One to many.
    public function user()
    {
        return $this->belongsTo('Curator\Repositories\Models\User');
    }
}
