<?php

namespace App\Services\Web\System;

use App\Services\WebService;

class TranslateService extends WebService
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return [];
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @param $request
     */
    public function create()
    {
        return [];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array  $request
     * @return array
     */
    public function store($request)
    {
        try {
            $this->languageInterface->create($request);

            toastr()->success('Data translate berhasil di tambahkan', 'System');

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function show($id)
    {
        return [
            'translate' => $this->languageInterface->findById($id)
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return array
     */
    public function edit($id)
    {
        return [
            'translate' => $this->languageInterface->findById($id)
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array  $request
     * @param  int  $id
     * @return array
     */
    public function update($request, $id)
    {
        try {
            $this->languageInterface->update($id, $request);

            toastr()->success('Data translate berhasil di ubah', 'System');

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return array
     */
    public function destroy($id)
    {
        $this->languageInterface->deleteById($id);
        
        toastr()->success('Data translate berhasil di hapus', 'System');

        return true;
    }
}