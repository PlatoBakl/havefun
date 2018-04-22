<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * @var array
     */
    protected $guarded  = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    protected $table = 'locations';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events(){
        return $this->hasMany('App\Models\Event','location_id');
    }

    public function allowDelete(){
        return (!$this->events()->count())? true : false;
    }
}
