<?php

/*
|--------------------------------------------------------------------------
| Curator: Setting Model
|--------------------------------------------------------------------------
|
| Curators setting model for the Setting table.
|
*/

namespace Curator\Repositories\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //Mass assignment
    protected $fillable = [
        'login_method',
        'remember_me',
        'login_throttling',
        'login_throttling_attempts',
        'login_throttling_lockout',
        'user_idle_time',
        'default_role_id',
        'login_page'
    ];

    //Cast: 'rememberMe' & 'loginThrottling' as BOOLEAN.
    protected $casts = [
        'remember_me'      => 'boolean',
        'login_throttling' => 'boolean'
    ];

    //Relationship: Setting can be assigned one default role. One to one.
    public function role()
    {
        return $this->hasOne('Curator\Repositores\Models\Role', NULL, 'default_role_id');
    }
}
