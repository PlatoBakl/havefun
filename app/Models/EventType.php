<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    /**
     * @var string
     */
    protected $table = 'event_types';

    /**
     * @var array
     */
    protected $guarded  = ['id', 'created_at', 'updated_at'];
}
