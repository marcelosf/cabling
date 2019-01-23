<?php

namespace App\Presenters;

use App\Transformers\PatchTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PatchPresenter.
 *
 * @package namespace App\Presenters;
 */
class PatchPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PatchTransformer();
    }
}
