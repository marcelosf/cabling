<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SwitchPort.
 *
 * @package namespace App\Entities;
 */
class SwitchPort extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'port_number',
        'poe',
        'poe_status',
        'vlan',
        'switch_name',
        'switch_brand',
        'switch_code',
        'stack_name',
        'stack_ip',
        'rack_id',
    ];

    protected $table = 'switch_port';

    public function rack()
    {
        return $this->belongsTo('App\Entities\Rack');
    }

}
