<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\DataTables\Admin\RoleDataTable;
use App\Services\Web\Admin\RoleService;
use App\Http\Requests\Web\Admin\Role\StoreRequest;
use App\Http\Requests\Web\Admin\Role\UpdateRequest;

class RoleController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'admin.role.index';
        $this->indexView = 'pages.admin.role.index';
        $this->createView = 'pages.admin.role.create';
        $this->showView = 'pages.admin.role.show';
        $this->editView = 'pages.admin.role.edit';

        $this->middleware('auth');
        $this->middleware(['permission:role.index'], ['only' => ['index']]);
        $this->middleware(['permission:role.create'], ['only' => ['create']]);
        $this->middleware(['permission:role.store'], ['only' => ['store']]);
        $this->middleware(['permission:role.show'], ['only' => ['show']]);
        $this->middleware(['permission:role.edit'], ['only' => ['edit']]);
        $this->middleware(['permission:role.update'], ['only' => ['update']]);
        $this->middleware(['permission:role.delete'], ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Admin\RoleService  $service
     * @param  \App\DataTables\Admin\RoleDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(RoleService $service, RoleDataTable $dataTable)
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
     * @param  \App\Services\Web\Admin\RoleService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(RoleService $service)
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
     * @param  \App\Http\Requests\Web\Admin\Role\StoreRequest  $request
     * @param  \App\Services\Web\Admin\RoleService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, RoleService $service)
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
     * @param  \App\Services\Web\Admin\RoleService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoleService $service, $id)
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
     * @param  \App\Services\Web\Admin\RoleService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleService $service, $id)
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
     * @param  \App\Http\Requests\Web\Admin\Role\UpdateRequest  $request
     * @param  \App\Services\Web\Admin\RoleService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, RoleService $service, $id)
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
     * @param  \App\Services\Web\Admin\RoleService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleService $service, $id)
    {
        try {
            return $service->destroy($id) ? to_route($this->routeName) : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
