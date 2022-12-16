<?php

namespace App\Http\Controllers\Web\System;

use App\Http\Controllers\WebController;
use App\Services\Web\System\ApplicationService;
use App\Http\Requests\Web\System\Application\StoreRequest;

class ApplicationController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\System\ApplicationService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(ApplicationService $service)
    {
        try {
            return view('pages.system.application.index', $service->index());
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
            return $service->store($request->validated()) ? to_route('admin.system.application.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
