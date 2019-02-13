<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Phone;

/**
 * Class PhoneTransformer.
 *
 * @package namespace App\Transformers;
 */
class PhoneTransformer extends TransformerAbstract
{
    /**
     * Transform the Phone entity.
     *
     * @param \App\Entities\Phone $model
     *
     * @return array
     */
    public function transform(Phone $model)
    {

        return [
            'id' => (int) $model->id,
            'number' => $model->number,
            'category' => $model->category,
            'voicepanel_id' => $model->voicepanel_id,
            'switchport_id' => $model->switchport_id,
            'voicepanel' => $model->voicepanel->voiceport_number,
            'switchport' => $model->switchport->port_number,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
