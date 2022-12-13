<?php

namespace App\Http\Controllers\Web\Audit;

use App\Http\Controllers\WebController;
use App\Services\Web\Audit\AuthService;
use App\DataTables\Audit\AuthDataTable;

class AuthController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Services\Web\Audit\AuthService  $service
     * @param  \App\DataTables\Audit\AuthDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(AuthService $service, AuthDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.audit.auth.index', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Services\Web\Audit\AuthService  $service
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show(AuthService $service, $name)
    {
        try {
            return view('pages.audit.auth.show', $service->show($name));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
