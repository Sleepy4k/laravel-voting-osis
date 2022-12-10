<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\WebController;
use App\Services\Web\Auth\LoginService;
use App\Http\Requests\Web\Auth\Login\StoreRequest;

class LoginController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return view('pages.auth.login');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, LoginService $service)
    {
        try {
            return $service->store($request->validated()) ? to_route('main.dashboard.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}