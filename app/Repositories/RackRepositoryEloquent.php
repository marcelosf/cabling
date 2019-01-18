<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RackRepository;
use App\Entities\Rack;
use App\Validators\RackValidator;
use App\Presenters\RackPresenter;

/**
 * Class RackRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RackRepositoryEloquent extends BaseRepository implements RackRepository
{
    
    protected $fieldSearchable = [
        'name',
        'local_id'
    ];
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Rack::class;
    }

    public function presenter()
    {
        return RackPresenter::class;
    }
    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
