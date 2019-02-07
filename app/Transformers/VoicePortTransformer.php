<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\VoicePort;

/**
 * Class VoicePortTransformer.
 *
 * @package namespace App\Transformers;
 */
class VoicePortTransformer extends TransformerAbstract
{
    /**
     * Transform the VoicePort entity.
     *
     * @param \App\Entities\VoicePort $model
     *
     * @return array
     */
    public function transform(VoicePort $model)
    {
        return [
            'id'=> (int) $model->id,
            'voiceport_number' => (int) $model->voiceport_number,
            'central' => (int) $model->central,
            'distribution' => (int) $model->distribution,
            'rack_id' => (int) $model->rack_id,
            'rack' => $model->rack->name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
