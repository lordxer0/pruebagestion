<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{

    protected $fillable = [
        'name',
        'category',
        'mark',
        'seria_number'
    ];

    public function Users()
    {
        return $this->hasMany('App\ResourcesUser');
    }
    
}
