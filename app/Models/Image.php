<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * @var array
     */
    protected $guarded  = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    protected $table = 'images';

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
