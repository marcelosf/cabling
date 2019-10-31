<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PatchRepositoryEloquent;

/**
 * Return Search index view
 */
class SearchController extends Controller
{

    /**
     * @var PatchRepository
     */
    protected $repository;

    /**
     * Search Controller constructor
     * 
     * @param PatchRepository $repository
     */
    public function __construct(PatchRepositoryEloquent $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('search.index');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patch = $this->repository->find($id);
        
        return view('search.show', compact('patch'));
    }
}
