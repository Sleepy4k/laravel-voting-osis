<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\ApiController;
use App\Services\Api\Main\CandidateService;

class CandidateController extends ApiController
{
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
