<?php

namespace App\Services\Web\System;

use App\Services\WebService;

class ApplicationService extends WebService
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return [
            'application' => $this->applicationInterface->findById(1)
        ];
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @param $request
     */
    public function create()
    {
        return [
            'application' => $this->applicationInterface->findById(1)
        ];
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
            $application = $this->applicationInterface->findById(1);

            if (empty($application)) {
                return false;
            }

            if (!empty($request['app_icon'])) {
                $request['app_icon'] = $this->updateSingleFile('image', $request['app_icon'], $application->app_icon);
            }
            
            $application->update($request);

            toastr()->success('Data aplikasi berhasil di tambahkan', 'System');

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}