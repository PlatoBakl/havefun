<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @var string
     */
    protected $table = 'events';

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start',
        'end'
    ];

    protected $appends = ['cover'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location()
    {
        return $this->hasOne('App\Models\Location', 'id', 'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function eventType()
    {
        return $this->hasOne('App\Models\EventType', 'id', 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'events_users', 'event_id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image', 'event_id');
    }

    public function mediaInfo()
    {
        return $this->hasMany('App\Models\MediaInfo', 'event_id');
    }

    public function getCoverAttribute()
    {
        $image = $this->images()->where('cover', 1)->first();
        return ($image) ? $image->url : 'image/default.png';
    }

}
