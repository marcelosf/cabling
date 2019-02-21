<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class VoicePort.
 *
 * @package namespace App\Entities;
 */
class VoicePort extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voiceport_number',
        'central',
        'distribution',
        'rack_id'
    ];

    public function rack()
    {
        return $this->belongsTo('App\Entities\Rack');
    }

    public function patch()
    {
        return $this->belongsTo('App\Entities\Patch');
    }

}
