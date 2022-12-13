<?php

namespace App\Http\Controllers\Web\Audit;

use App\Http\Controllers\WebController;
use App\Services\Web\Audit\ModelService;
use App\DataTables\Audit\ModelDataTable;

class ModelController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Audit\ModelService  $service
     * @param  \App\DataTables\Audit\ModelDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(ModelService $service, ModelDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.audit.model.index', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\Web\Audit\ModelService  $service
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show(ModelService $service, $name)
    {
        try {
            return view('pages.audit.model.show', $service->show($name));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
