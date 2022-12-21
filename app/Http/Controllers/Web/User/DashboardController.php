<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\WebController;
use App\Services\Web\User\DashboardService;
use App\Http\Requests\Web\User\Dashboard\StoreRequest;

class DashboardController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->indexView = 'pages.user.dashboard';
        $this->createView = 'pages.user.success';

        $this->middleware('auth');
        $this->middleware(['permission:dashboard.index'], ['only' => ['index']]);
        $this->middleware(['permission:dashboard.store'], ['only' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\User\DashboardService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(DashboardService $service)
    {
        try {
            return view($this->indexView, $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\User\Dashboard\StoreRequest  $request
     * @param  \App\Services\Web\User\DashboardService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, DashboardService $service)
    {
        try {
            return $service->store($request->validated()) ? view($this->createView) : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
