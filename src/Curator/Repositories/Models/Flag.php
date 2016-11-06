<?php

/*
|--------------------------------------------------------------------------
| Curator: Flag Model
|--------------------------------------------------------------------------
|
| Curators flag model for the Flag table.
|
*/

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    //Mass assignment
    protected $fillable = ['name'];

    //Disable timestamps for this model.
    public $timestamps = false;

    //Relationship: Each status can be assigned to multiple users. Many to many.
    //Flag belongsToMany User as defined by UserFlag with userID and flagID.
    public function users()
    {
        return $this->belongsToMany('Curator\Models\Repositories\User', 'UserFlag');
    }
}
