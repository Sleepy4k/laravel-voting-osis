<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\ApiController;
use App\Services\Api\Main\CandidateService;

class CandidateController extends ApiController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware(['permission:candidate.index'], ['only' => ['index']]);
        $this->middleware(['permission:candidate.show'], ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Api\Main\CandidateService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(CandidateService $service)
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
     * @param  \App\Services\Api\Main\CandidateService  $service
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show(CandidateService $service, $code)
    {
        try {
            return $service->show($code);
        } catch (\Throwable $th) {
            return $this->catchError($th);
        }
    }
}
