<?php

/*
|--------------------------------------------------------------------------
| Curator: Status Model
|--------------------------------------------------------------------------
|
| Curators status model for the Status table.
|
*/

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //Mass assignment.
    protected $fillable = ['name'];

    //Use a specific table name.
    protected $table = 'status';

    //Relationship: One status can be assigned to many users. One to many.
    public function user()
    {
        return $this->hasMany('Curator\Repositories\Models\User');
    }

    //Relationship: Connects Activities to Status's through the User table.
    public function activity()
    {
        return $this->hasManyThrough('Curator\Repositories\Models\Activity',
                                     'Curator\Repositories\Models\User');
    }
}
