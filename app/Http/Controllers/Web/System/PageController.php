<?php

namespace App\Http\Controllers\Web\System;

use App\Http\Controllers\WebController;
use App\DataTables\System\PageDataTable;
use App\Services\Web\System\PageService;
use App\Http\Requests\Web\System\Page\StoreRequest;
use App\Http\Requests\Web\System\Page\UpdateRequest;

class PageController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'admin.system.page.index';
        $this->indexView = 'pages.system.page.index';
        $this->createView = 'pages.system.page.create';
        $this->showView = 'pages.system.page.show';
        $this->editView = 'pages.system.page.edit';
        
        $this->middleware('auth');
        $this->middleware(['permission:page.index'], ['only' => ['index']]);
        $this->middleware(['permission:page.create'], ['only' => ['create']]);
        $this->middleware(['permission:page.store'], ['only' => ['store']]);
        $this->middleware(['permission:page.show'], ['only' => ['show']]);
        $this->middleware(['permission:page.edit'], ['only' => ['edit']]);
        $this->middleware(['permission:page.update'], ['only' => ['update']]);
        $this->middleware(['permission:page.delete'], ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\System\PageService  $service
     * @param  \App\DataTables\System\PageDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(PageService $service, PageDataTable $dataTable)
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
     * @param  \App\Services\Web\System\PageService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(PageService $service)
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
     * @param  \App\Http\Requests\Web\System\Page\StoreRequest  $request
     * @param  \App\Services\Web\System\PageService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, PageService $service)
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
     * @param  \App\Services\Web\System\PageService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PageService $service, $id)
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
     * @param  \App\Services\Web\System\PageService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PageService $service, $id)
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
     * @param  \App\Http\Requests\Web\System\Page\UpdateRequest  $request
     * @param  \App\Services\Web\System\PageService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, PageService $service, $id)
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
     * @param  \App\Services\Web\System\PageService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return to_route($this->routeName);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
