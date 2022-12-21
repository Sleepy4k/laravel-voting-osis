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
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'admin.system.menu.index';
        $this->indexView = 'pages.system.menu.index';
        $this->createView = 'pages.system.menu.create';
        $this->showView = 'pages.system.menu.show';
        $this->editView = 'pages.system.menu.edit';
        
        $this->middleware('auth');
        $this->middleware(['permission:menu.index'], ['only' => ['index']]);
        $this->middleware(['permission:menu.create'], ['only' => ['create']]);
        $this->middleware(['permission:menu.store'], ['only' => ['store']]);
        $this->middleware(['permission:menu.show'], ['only' => ['show']]);
        $this->middleware(['permission:menu.edit'], ['only' => ['edit']]);
        $this->middleware(['permission:menu.update'], ['only' => ['update']]);
        $this->middleware(['permission:menu.delete'], ['only' => ['delete']]);
    }

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
            return $dataTable->render($this->indexView, $service->index());
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
            return view($this->createView, $service->create());
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
            return $service->store($request->validated()) ? to_route($this->routeName) : back();
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
            return view($this->showView, $service->show($id));
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
            return view($this->editView, $service->edit($id));
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
            return $service->update($request->validated(), $id) ? to_route($this->routeName) : back();
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
    
            return to_route($this->routeName);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
