<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\DataTables\Admin\CandidateDataTable;
use App\Services\Web\Admin\CandidateService;
use App\Http\Requests\Web\Admin\Candidate\StoreRequest;
use App\Http\Requests\Web\Admin\Candidate\UpdateRequest;

class CandidateController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'admin.candidate.index';
        $this->indexView = 'pages.admin.candidate.index';
        $this->createView = 'pages.admin.candidate.create';
        $this->showView = 'pages.admin.candidate.show';
        $this->editView = 'pages.admin.candidate.edit';

        $this->middleware('auth');
        $this->middleware(['permission:candidate.index'], ['only' => ['index']]);
        $this->middleware(['permission:candidate.create'], ['only' => ['create']]);
        $this->middleware(['permission:candidate.store'], ['only' => ['store']]);
        $this->middleware(['permission:candidate.show'], ['only' => ['show']]);
        $this->middleware(['permission:candidate.edit'], ['only' => ['edit']]);
        $this->middleware(['permission:candidate.update'], ['only' => ['update']]);
        $this->middleware(['permission:candidate.delete'], ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Admin\CandidateService  $service
     * @param  \App\DataTables\Admin\CandidateDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(CandidateService $service, CandidateDataTable $dataTable)
    {
        try {
            return $dataTable->render($this->indexView, $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Services\Web\Admin\CandidateService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(CandidateService $service)
    {
        try {
            return view($this->createView, $service->create());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\Candidate\StoreRequest  $request
     * @param  \App\Services\Web\Admin\CandidateService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, CandidateService $service)
    {
        try {
            return $service->store($request->validated()) ? to_route($this->routeName) : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\Web\Admin\CandidateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CandidateService $service, $id)
    {
        try {
            return view($this->showView, $service->show($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services\Web\Admin\CandidateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CandidateService $service, $id)
    {
        try {
            return view($this->editView, $service->edit($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\Admin\Candidate\UpdateRequest  $request
     * @param  \App\Services\Web\Admin\CandidateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, CandidateService $service, $id)
    {
        try {
            return $service->update($request->validated(), $id) ? to_route($this->routeName) : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services\Web\Admin\CandidateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CandidateService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return to_route($this->routeName);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
