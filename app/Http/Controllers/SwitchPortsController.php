<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SwitchPortCreateRequest;
use App\Http\Requests\SwitchPortUpdateRequest;
use App\Validators\SwitchPortValidator;
use App\Repositories\SwitchPortRepositoryEloquent;

/**
 * Class SwitchPortsController.
 *
 * @package namespace App\Http\Controllers;
 */
class SwitchPortsController extends Controller
{
    /**
     * @var SwitchPortRepository
     */
    protected $repository;

    /**
     * @var SwitchPortValidator
     */
    protected $validator;

    /**
     * SwitchPortsController constructor.
     *
     * @param SwitchPortRepository $repository
     * @param SwitchPortValidator $validator
     */
    public function __construct(SwitchPortRepositoryEloquent $repository, SwitchPortValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $switch_ports = $this->repository->paginate(10);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $switch_ports,
            ]);
        }

        return view('switch_ports.index', compact('switchPorts'));
    }

    public function create()
    {
        return view('switch_ports.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  SwitchPortCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SwitchPortCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $switchPort = $this->repository->create($request->all());

            $response = [
                'message' => 'Porta do switch criada com sucesso',
                'data'    => $switchPort,
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $switchPort = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $switchPort,
            ]);
        }

        return view('switchPorts.show', compact('switchPort'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $port = $this->repository->find($id);

        return view('switch_ports.edit', compact('port'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SwitchPortUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SwitchPortUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $switchPort = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Porta do Switch Atualizada',
                'data'    => $switchPort,
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'SwitchPort deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'SwitchPort deleted.');
    }
}
