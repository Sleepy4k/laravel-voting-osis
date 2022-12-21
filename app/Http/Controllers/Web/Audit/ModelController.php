<?php

namespace App\Http\Controllers\Web\Audit;

use App\Http\Controllers\WebController;
use App\Services\Web\Audit\ModelService;
use App\DataTables\Audit\ModelDataTable;

class ModelController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->indexView = 'pages.audit.model.index';
        $this->showView = 'pages.audit.model.show';

        $this->middleware('auth');
        $this->middleware(['permission:model.index'], ['only' => ['index']]);
        $this->middleware(['permission:model.show'], ['only' => ['show']]);
    }

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
            return $dataTable->render($this->indexView, $service->index());
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
            return view($this->showView, $service->show($name));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
