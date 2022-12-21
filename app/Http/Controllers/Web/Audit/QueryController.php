<?php

namespace App\Http\Controllers\Web\Audit;

use App\Http\Controllers\WebController;
use App\Services\Web\Audit\QueryService;
use App\DataTables\Audit\QueryDataTable;
use App\DataTables\Audit\QueryShowDataTable;

class QueryController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->indexView = 'pages.audit.query.index';
        $this->showView = 'pages.audit.query.show';

        $this->middleware('auth');
        $this->middleware(['permission:query.index'], ['only' => ['index']]);
        $this->middleware(['permission:query.show'], ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Audit\QueryService  $service
     * @param  \App\DataTables\Audit\QueryDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(QueryService $service, QueryDataTable $dataTable)
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
     * @param  \App\Services\Web\Audit\QueryService  $service
     * @param  \App\DataTables\Audit\QueryShowDataTable  $dataTable
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show(QueryService $service, QueryShowDataTable $dataTable, $name)
    {
        try {
            return $dataTable->render($this->showView, $service->show($name));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
