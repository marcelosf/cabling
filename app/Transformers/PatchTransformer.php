<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Patch;

/**
 * Class PatchTransformer.
 *
 * @package namespace App\Transformers;
 */
class PatchTransformer extends TransformerAbstract
{
    /**
     * Transform the Patch entity.
     *
     * @param \App\Entities\Patch $model
     *
     * @return array
     */
    public function transform(Patch $model)
    {
        return [
            'id' => (int) $model->id,
            'label' => $model->label,
            'number' => $model->number,
            'switch_port' => $model->switch_port,
            'rack' => $model->rack,
            'local' => $model->local,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
