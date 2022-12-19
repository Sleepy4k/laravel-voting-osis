<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use App\Services\Api\Auth\LoginService;
use App\Http\Requests\Api\Auth\Login\StoreRequest;

class LoginController extends ApiController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\Api\Auth\LoginService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, LoginService $service)
    {
        try {
            return $service->store($request->validated());
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
