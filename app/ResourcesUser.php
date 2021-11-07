<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourcesUser extends Model
{
    protected $fillable = [
        'resource_id',
        'user_id',
        'state',
    ];

    public function resourcesUser()
    {
        return $this->belongsTo('App\Resource','resource_id','id');
    }

    public function usersResources()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
