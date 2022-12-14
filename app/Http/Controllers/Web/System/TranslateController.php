<?php

namespace App\Http\Controllers\Web\System;

use App\Http\Controllers\WebController;
use App\DataTables\System\TranslateDataTable;
use App\Services\Web\System\TranslateService;
use App\Http\Requests\Web\System\Translate\StoreRequest;
use App\Http\Requests\Web\System\Translate\UpdateRequest;

class TranslateController extends WebController
{
    /**
     * Display a listing of the resource.
     *
     * @param  \pp\Services\Web\System\TranslateService  $service
     * @param  \App\DataTables\System\TranslateDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(TranslateService $service, TranslateDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.system.translate.index', $service->index());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \pp\Services\Web\System\TranslateService  $service
     * @return \Illuminate\Http\Response
     */
    public function create(TranslateService $service)
    {
        try {
            return view('pages.system.translate.create', $service->create());
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Web\System\Translate\StoreRequest  $request
     * @param  \pp\Services\Web\System\TranslateService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, TranslateService $service)
    {
        try {
            return $service->store($request->validated()) ? to_route('admin.system.translate.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \pp\Services\Web\System\TranslateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TranslateService $service, $id)
    {
        try {
            return view('pages.system.translate.show', $service->show($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \pp\Services\Web\System\TranslateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TranslateService $service, $id)
    {
        try {
            return view('pages.system.translate.edit', $service->edit($id));
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Web\System\Translate\UpdateRequest  $request
     * @param  \pp\Services\Web\System\TranslateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, TranslateService $service, $id)
    {
        try {
            return $service->update($request->validated(), $id) ? to_route('admin.system.translate.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \pp\Services\Web\System\TranslateService  $service
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TranslateService $service, $id)
    {
        try {
            $service->destroy($id);
    
            return to_route('admin.system.translate.index');
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
