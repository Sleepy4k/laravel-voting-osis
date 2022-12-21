<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\DataTables\Admin\PermissionDataTable;
use App\Services\Web\Admin\PermissionService;
use App\Http\Requests\Web\Admin\Permission\StoreRequest;
use App\Http\Requests\Web\Admin\Permission\UpdateRequest;

class PermissionController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'admin.permission.index';
        $this->indexView = 'pages.admin.permission.index';
        $this->createView = 'pages.admin.permission.create';
        $this->showView = 'pages.admin.permission.show';
        $this->editView = 'pages.admin.permission.edit';

        $this->middleware('auth');
        $this->middleware(['permission:permission.index'], ['only' => ['index']]);
        $this->middleware(['permission:permission.create'], ['only' => ['create']]);
        $this->middleware(['permission:permission.store'], ['only' => ['store']]);
        $this->middleware(['permission:permission.show'], ['only' => ['show']]);
        $this->middleware(['permission:permission.edit'], ['only' => ['edit']]);
        $this->middleware(['permission:permission.update'], ['only' => ['update']]);
        $this->middleware(['permission:permission.delete'], ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Admin\PermissionService  $service
     * @param  \App\DataTables\Admin\PermissionDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(PermissionService $service, PermissionDataTable $dataTable)
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
     * @param  \App\Services\Web\Admin\PermissionService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(PermissionService $service)
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
     * @param  \App\Http\Requests\Web\Admin\Permission\StoreRequest  $request
     * @param  \App\Services\Web\Admin\PermissionService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, PermissionService $service)
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
     * @param  \App\Services\Web\Admin\PermissionService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PermissionService $service, $id)
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
     * @param  \App\Services\Web\Admin\PermissionService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PermissionService $service, $id)
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
     * @param  \App\Http\Requests\Web\Admin\Permission\UpdateRequest  $request
     * @param  \App\Services\Web\Admin\PermissionService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, PermissionService $service, $id)
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
     * @param  \App\Services\Web\Admin\PermissionService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermissionService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return to_route($this->routeName);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
