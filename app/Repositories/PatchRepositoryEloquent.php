<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PatchRepository;
use App\Entities\Patch;
use App\Validators\PatchValidator;
use App\Presenters\PatchPresenter;

/**
 * Class PatchRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PatchRepositoryEloquent extends BaseRepository implements PatchRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Patch::class;
    }

    public function presenter()
    {
        return PatchPresenter::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return PatchValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
