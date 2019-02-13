<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Phone.
 *
 * @package namespace App\Entities;
 */
class Phone extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'category',
        'voicepanel_id',
        'switchport_id',
    ];

    public function voicepanel()
    {
        return $this->belongsTo('App\Entities\VoicePort', 'voicepanel_id');
    }

    public function switchport()
    {
        return $this->belongsTo('App\Entities\SwitchPort', 'switchport_id');
    }

}
