<?php

namespace App\Presenters;

use App\Transformers\SwitchPortTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SwitchPortPresenter.
 *
 * @package namespace App\Presenters;
 */
class SwitchPortPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SwitchPortTransformer();
    }
}
