<?php

namespace App\Http\Controllers\Web\System;

use App\Http\Controllers\WebController;
use App\DataTables\System\TranslateDataTable;
use App\Services\Web\System\TranslateService;
use App\Http\Requests\Web\System\Translate\StoreRequest;
use App\Http\Requests\Web\System\Translate\UpdateRequest;

class TranslateController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'admin.system.translate.index';
        $this->indexView = 'pages.system.translate.index';
        $this->createView = 'pages.system.translate.create';
        $this->showView = 'pages.system.translate.show';
        $this->editView = 'pages.system.translate.edit';

        $this->middleware('auth');
        $this->middleware(['permission:translate.index'], ['only' => ['index']]);
        $this->middleware(['permission:translate.create'], ['only' => ['create']]);
        $this->middleware(['permission:translate.store'], ['only' => ['store']]);
        $this->middleware(['permission:translate.show'], ['only' => ['show']]);
        $this->middleware(['permission:translate.edit'], ['only' => ['edit']]);
        $this->middleware(['permission:translate.update'], ['only' => ['update']]);
        $this->middleware(['permission:translate.delete'], ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\System\TranslateService  $service
     * @param  \App\DataTables\System\TranslateDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(TranslateService $service, TranslateDataTable $dataTable)
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
     * @param  \App\Services\Web\System\TranslateService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(TranslateService $service)
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
     * @param  \App\Http\Requests\Web\System\Translate\StoreRequest  $request
     * @param  \App\Services\Web\System\TranslateService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, TranslateService $service)
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
     * @param  \App\Services\Web\System\TranslateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TranslateService $service, $id)
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
     * @param  \App\Services\Web\System\TranslateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslateService $service, $id)
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
     * @param  \App\Http\Requests\Web\System\Translate\UpdateRequest  $request
     * @param  \App\Services\Web\System\TranslateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, TranslateService $service, $id)
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
     * @param  \App\Services\Web\System\TranslateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslateService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return to_route($this->routeName);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
