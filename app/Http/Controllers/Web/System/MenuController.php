<?php

namespace App\Http\Controllers\Web\System;

use App\Http\Controllers\WebController;
use App\DataTables\System\MenuDataTable;
use App\Services\Web\System\MenuService;
use App\Http\Requests\Web\System\Menu\StoreRequest;
use App\Http\Requests\Web\System\Menu\UpdateRequest;

class MenuController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\System\MenuService  $service
     * @param  \App\DataTables\System\MenuDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(MenuService $service, MenuDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.system.menu.index', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Services\Web\System\MenuService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(MenuService $service)
    {
        try {
            return view('pages.system.menu.create', $service->create());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\System\Menu\StoreRequest  $request
     * @param  \App\Services\Web\System\MenuService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, MenuService $service)
    {
        try {
            return $service->store($request->validated()) ? to_route('admin.system.menu.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\Web\System\MenuService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MenuService $service, $id)
    {
        try {
            return view('pages.system.menu.show', $service->show($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services\Web\System\MenuService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuService $service, $id)
    {
        try {
            return view('pages.system.menu.edit', $service->edit($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\System\Menu\UpdateRequest  $request
     * @param  \App\Services\Web\System\MenuService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, MenuService $service, $id)
    {
        try {
            return $service->update($request->validated(), $id) ? to_route('admin.system.menu.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services\Web\System\MenuService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return to_route('admin.system.menu.index');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
