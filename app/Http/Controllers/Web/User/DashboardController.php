<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\WebController;
use App\Services\Web\User\DashboardService;

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services\Web\User\DashboardService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashboardService $service, $id)
    {
        try {
            return $service->update($request, $id) ? view('pages.user.success') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
