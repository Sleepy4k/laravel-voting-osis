<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\DataTables\Admin\UserDataTable;
use App\Services\Web\Admin\UserService;
use App\Http\Requests\Web\Admin\User\StoreRequest;
use App\Http\Requests\Web\Admin\User\UpdateRequest;

class UserController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'admin.user.index';
        $this->indexView = 'pages.admin.user.index';
        $this->createView = 'pages.admin.user.create';
        $this->showView = 'pages.admin.user.show';
        $this->editView = 'pages.admin.user.edit';

        $this->middleware('auth');
        $this->middleware(['permission:user.index'], ['only' => ['index']]);
        $this->middleware(['permission:user.create'], ['only' => ['create']]);
        $this->middleware(['permission:user.store'], ['only' => ['store']]);
        $this->middleware(['permission:user.show'], ['only' => ['show']]);
        $this->middleware(['permission:user.edit'], ['only' => ['edit']]);
        $this->middleware(['permission:user.update'], ['only' => ['update']]);
        $this->middleware(['permission:user.delete'], ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Admin\UserService  $service
     * @param  \App\DataTables\Admin\UserDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(UserService $service, UserDataTable $dataTable)
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
     * @param  \App\Services\Web\Admin\UserService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(UserService $service)
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
     * @param  \App\Http\Requests\Web\Admin\User\StoreRequest  $request
     * @param  \App\Services\Web\Admin\UserService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, UserService $service)
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
     * @param  \App\Services\Web\Admin\UserService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserService $service, $id)
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
     * @param  \App\Services\Web\Admin\UserService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserService $service, $id)
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
     * @param  \App\Http\Requests\Web\Admin\User\UpdateRequest  $request
     * @param  \App\Services\Web\Admin\UserService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, UserService $service, $id)
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
     * @param  \App\Services\Web\Admin\UserService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return to_route($this->routeName);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
