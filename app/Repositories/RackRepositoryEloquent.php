<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RackRepository;
use App\Entities\Rack;
use App\Validators\RackValidator;

/**
 * Class RackRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RackRepositoryEloquent extends BaseRepository implements RackRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Rack::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
