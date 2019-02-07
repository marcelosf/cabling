<?php

namespace App\Presenters;

use App\Transformers\VoicePortTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VoicePortPresenter.
 *
 * @package namespace App\Presenters;
 */
class VoicePortPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VoicePortTransformer();
    }
}
