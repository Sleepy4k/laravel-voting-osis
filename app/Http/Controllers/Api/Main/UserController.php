<?php

namespace App\Http\Controllers\Api\Main;

use App\Services\Api\Main\UserService;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware(['permission:user.index'], ['only' => ['index']]);
        $this->middleware(['permission:user.show'], ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Api\Main\UserService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(UserService $service)
    {
        try {
            return $service->index();
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\Api\Main\UserService  $service
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show(UserService $service, $code)
    {
        try {
            return $service->show($code);
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
