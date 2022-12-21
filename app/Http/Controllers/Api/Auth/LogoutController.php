<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Services\Api\Auth\LogoutService;

class LogoutController extends ApiController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Services\Api\Auth\LogoutService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(LogoutService $service)
    {
        try {
            return $service->store();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
