<?php

namespace App\Http\Controllers;

use App\Entities\Phone;
use Illuminate\Http\Request;
use App\Repositories\PhoneRepositoryEloquent;
use App\Validators\PhoneValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PhoneCreateRequest;
use App\Http\Requests\PhoneUpdateRequest;

class PhoneController extends Controller
{
    
    /**
     * @var PhoneRepository
     */
    protected $repository;

    /**
     * @var PhoneValidator
     */
    protected $validator;
    
    /**
     * Phone Controller constructor
     *
     * @param PhoneRepositoryEloquent $repository
     * @param PhoneValidator $validator
     */
    public function __construct(PhoneRepositoryEloquent $repository, PhoneValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app(RequestCriteria::class));
        $phones = $this->repository->paginate(10);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $phones,
            ]);
        }

        return view('phones.index', compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneCreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $phone = $this->repository->create($request->all());

            $response = [
                'message' => 'Ramal criado com sucesso',
                'data' => $phone,
            ];

            if (request()->wantsJson()) {
                return response()->json($response);
            }

        } catch (ValidatorException $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag(),
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show($phone)
    {
        $phone = $this->repository->find($phone);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $phone,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        $phone = $this->repository->find($phone);

        return view('phones.edit', compact('phone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneUpdateRequest $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $phone = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Ramal atualizado com sucesso',
                'data' => $phone,
            ];

            if (request()->wantsJson()) {
                return response()->json($response);
            }
        } catch (ValidatorException $e) {
            if (request()->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag(),
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        //
    }
}
