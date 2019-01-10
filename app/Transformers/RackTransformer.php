<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Rack;

/**
 * Class RackTransformer.
 *
 * @package namespace App\Transformers;
 */
class RackTransformer extends TransformerAbstract
{
    /**
     * Transform the Rack entity.
     *
     * @param \App\Entities\Rack $model
     *
     * @return array
     */
    public function transform(Rack $model)
    {
        return [
            'id' => (int) $model->id,
            'name' => $model->name,
            'build' => $model->local->build,
            'local' => $model->local->local,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
