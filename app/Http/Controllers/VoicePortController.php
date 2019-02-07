<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\VoicePortRepositoryEloquent;
use App\Validators\SwitchPortValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\VoicePortUpdateRequest;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


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

    /**
     * Edit View
     *
     * @param string $id
     * @return void
     */
    public function edit($id) 
    {

        $voiceport = $this->repository->find($id);

        return view('voice_ports.edit', compact('voiceport'));

    }

    /**
     * Update a voiceport
     *
     * @param  VoicePortUpdateRequest $request
     * @param  string                 $id
     * @return void
     * 
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(VoicePortUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $voiceport = $this->repository->update($request->all(), $id);
            $response = [
                'message' => 'Atualização realizada com sucesso',
                'data' => $voiceport,
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

        }
        
    }

}