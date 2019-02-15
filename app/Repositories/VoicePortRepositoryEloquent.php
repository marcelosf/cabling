<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VoicePortRepository;
use App\Entities\VoicePort;
use App\Validators\VoicePortValidator;

/**
 * Class VoicePortRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VoicePortRepositoryEloquent extends BaseRepository implements VoicePortRepository
{
    
    protected $fieldSearchable = [
        'rack_id',
    ];
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VoicePort::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return VoicePortValidator::class;
    }

    public function presenter()
    {
        return 'App\Presenters\VoicePortPresenter';
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
