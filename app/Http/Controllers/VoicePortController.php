<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\VoicePortRepositoryEloquent;
use App\Validators\SwitchPortValidator;
use Prettus\Repository\Criteria\RequestCriteria;


class VoicePortController extends Controller
{

    /**
     * @var VoicePortRepositoryEloquent
     */
    protected $repository;

    /**
     * @var VoicePortValidator
     */
    protected $validator;

    /**
     * VoicePortController constructor
     *
     * @param VoicePortRepositoryEloquent $repository
     * @param SwitchPortValidator $validator
     */
    public function __construct(VoicePortRepositoryEloquent $repository, SwitchPortValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the voice ports
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->repository->pushCriteria(app(RequestCriteria::class));
        $voice_ports = $this->repository->paginate(10);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $voice_ports
            ]);
        }

        return view('voice_ports.index', compact('voice_ports'));
    }

}