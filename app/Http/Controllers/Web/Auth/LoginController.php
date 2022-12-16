<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\WebController;
use App\Services\Web\Auth\LoginService;
use App\Http\Requests\Web\Auth\Login\StoreRequest;

class LoginController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'main.dashboard.index';
        $this->indexView = 'pages.auth.login';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view($this->indexView);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\Auth\Login\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, LoginService $service)
    {
        try {
            return $service->store($request->validated()) ? to_route($this->routeName) : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}