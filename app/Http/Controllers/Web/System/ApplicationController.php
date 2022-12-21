<?php

namespace App\Http\Controllers\Web\System;

use App\Http\Controllers\WebController;
use App\Services\Web\System\ApplicationService;
use App\Http\Requests\Web\System\Application\StoreRequest;

class ApplicationController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'admin.system.application.index';
        $this->indexView = 'pages.system.application.index';
        $this->createView = 'pages.system.application.create';
        
        $this->middleware('auth');
        $this->middleware(['permission:application.index'], ['only' => ['index']]);
        $this->middleware(['permission:application.create'], ['only' => ['create']]);
        $this->middleware(['permission:application.store'], ['only' => ['store']]);
        $this->middleware(['permission:application.show'], ['only' => ['show']]);
        $this->middleware(['permission:application.edit'], ['only' => ['edit']]);
        $this->middleware(['permission:application.update'], ['only' => ['update']]);
        $this->middleware(['permission:application.delete'], ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\System\ApplicationService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(ApplicationService $service)
    {
        try {
            return view($this->indexView, $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Services\Web\System\ApplicationService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(ApplicationService $service)
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
     * @param  \App\Http\Requests\Web\System\Application\StoreRequest  $request
     * @param  \App\Services\Web\System\ApplicationService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, ApplicationService $service)
    {
        try {
            return $service->store($request->validated()) ? to_route($this->routeName) : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
