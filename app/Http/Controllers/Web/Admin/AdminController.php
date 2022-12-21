<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\WebController;
use App\Services\Web\Admin\AdminService;
use App\Http\Requests\Web\Admin\Admin\ImportRequest;

class AdminController extends WebController
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Reset user voting status
     *
     * @param  \App\Services\Web\Admin\AdminService  $service
     * @param  int  $user
     * @param  int  $candidate
     * @return \Illuminate\Http\Response
     */
    public function reset(AdminService $service, $user, $candidate)
    {
        try {
            $service->reset($user, $candidate);

            return to_route('admin.user.show', $user);
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Import user voter data
     *
     * @param  \App\Http\Requests\Web\Admin\Admin\ImportRequest  $request
     * @param  \App\Services\Web\Admin\AdminService  $service
     * @return \Illuminate\Http\Response
     */
    public function import(ImportRequest $request, AdminService $service)
    {
        try {
            return $service->import($request->validated()) ? to_route('admin.user.index') : back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }

    /**
     * Download template
     *
     * @param  \App\Services\Web\Admin\AdminService  $service
     * @return \Illuminate\Http\Response
     */
    public function template(AdminService $service)
    {
        try {
            $service->template();

            return back();
        } catch (\Throwable $th) {
            return $this->redirectError($th);
        }
    }
}
