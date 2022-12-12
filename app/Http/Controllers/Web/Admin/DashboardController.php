<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\Services\Web\Admin\DashboardService;

class DashboardController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Admin\DashboardService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(DashboardService $service)
    {
        try {
            return view('pages.admin.dashboard', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
