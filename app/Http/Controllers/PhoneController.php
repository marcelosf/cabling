<?php

namespace App\Http\Controllers;

use App\Entities\Phone;
use Illuminate\Http\Request;
use App\Repositories\PhoneRepositoryEloquent;
use App\Validators\PhoneValidator;
use Prettus\Repository\Criteria\RequestCriteria;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        //
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
