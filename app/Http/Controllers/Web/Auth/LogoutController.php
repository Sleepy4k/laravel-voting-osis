<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;
use App\Services\Web\Auth\LogoutService;

class LogoutController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = 'main.dashboard.index';
        
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LogoutService $service)
    {
        try {
            $service->store($request);
    
            return to_route($this->routeName);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}