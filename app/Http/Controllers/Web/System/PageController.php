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
     * Display a listing of the resource.
     *
     * @param  \pp\Services\Web\System\PageService  $service
     * @param  \App\DataTables\System\PageDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(PageService $service, PageDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.system.page.index', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \pp\Services\Web\System\PageService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(PageService $service)
    {
        try {
            return view('pages.system.page.create', $service->create());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\System\Page\StoreRequest  $request
     * @param  \pp\Services\Web\System\PageService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, PageService $service)
    {
        try {
            return $service->store($request->validated()) ? to_route('admin.system.page.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \pp\Services\Web\System\PageService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PageService $service, $id)
    {
        try {
            return view('pages.system.page.show', $service->show($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \pp\Services\Web\System\PageService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PageService $service, $id)
    {
        try {
            return view('pages.system.page.edit', $service->edit($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\System\Page\UpdateRequest  $request
     * @param  \pp\Services\Web\System\PageService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, PageService $service, $id)
    {
        try {
            return $service->update($request->validated(), $id) ? to_route('admin.system.page.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \pp\Services\Web\System\PageService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return to_route('admin.system.page.index');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
