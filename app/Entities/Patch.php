<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Patch.
 *
 * @package namespace App\Entities;
 */
class Patch extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label',
        'number',
        'switch_port',
        'rack_id',
        'local_id',
    ];

    public function local()
    {
        return $this->belongsTo('App\Entities\Local');
    }

    public function rack()
    {
        return $this->belongsTo('App\Entities\Rack');
    }
}
