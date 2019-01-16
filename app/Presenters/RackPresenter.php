<?php

namespace App\Presenters;

use App\Transformers\RackTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RackPresenter.
 *
 * @package namespace App\Presenters;
 */
class RackPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RackTransformer();
    }
}
