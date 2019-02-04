<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SwitchPortRepository;
use App\Entities\SwitchPort;
use App\Validators\SwitchPortValidator;

/**
 * Class SwitchPortRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SwitchPortRepositoryEloquent extends BaseRepository implements SwitchPortRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SwitchPort::class;
    }

    public function presenter()
    {
        return 'App\Presenters\SwitchPortPresenter';
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SwitchPortValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
