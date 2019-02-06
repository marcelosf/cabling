<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\SwitchPort;

/**
 * Class SwitchPortTransformer.
 *
 * @package namespace App\Transformers;
 */
class SwitchPortTransformer extends TransformerAbstract
{
    /**
     * Transform the SwitchPort entity.
     *
     * @param \App\Entities\SwitchPort $model
     *
     * @return array
     */
    public function transform(SwitchPort $model)
    {
        return [
            'id' => (int) $model->id,
            'port_number' => $model->port_number,
            'poe' => $model->poe,
            'poe_status' => $model->poe_status,
            'vlan' => $model->vlan,
            'switch_name' => $model->switch_name,
            'switch_brand' => $model->switch_brand,
            'switch_code' => $model->switch_code,
            'stack_name' => $model->stack_name,
            'stack_ip' => $model->stack_ip,
            'rack_id' => $model->rack_id,
            'rack' => $model->rack->name,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
