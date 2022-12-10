<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\WebController;
use App\Services\Web\User\DashboardService;
use App\Http\Requests\Web\User\Dashboard\StoreRequest;

class DashboardController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\User\DashboardService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(DashboardService $service)
    {
        try {
            return view('pages.user.dashboard', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\User\Dashboard\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, DashboardService $service)
    {
        try {
            return $service->store($request->validated()) ? view('pages.user.success') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
