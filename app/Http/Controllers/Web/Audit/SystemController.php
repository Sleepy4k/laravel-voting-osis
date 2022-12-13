<?php

namespace App\Http\Controllers\Web\Audit;

use App\Http\Controllers\WebController;
use App\Services\Web\Audit\SystemService;
use App\DataTables\Audit\SystemDataTable;
use App\DataTables\Audit\SystemShowDataTable;

class SystemController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Audit\SystemService  $service
     * @param  \App\DataTables\Audit\SystemDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(SystemService $service, SystemDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.audit.system.index', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\Web\Audit\SystemService  $service
     * @param  \App\DataTables\Audit\SystemShowDataTable  $dataTable
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show(SystemService $service, SystemShowDataTable $dataTable, $name)
    {
        try {
            return $dataTable->render('pages.audit.system.show', $service->show($name));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
