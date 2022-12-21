<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\Services\Web\Admin\DashboardService;

class DashboardController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->indexView = 'pages.admin.dashboard';

        $this->middleware('auth');
        $this->middleware(['permission:dashboard.index'], ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Admin\DashboardService  $service
     * @return \Illuminate\Http\Response
     */
    public function index(DashboardService $service)
    {
        try {
            return view($this->indexView, $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
