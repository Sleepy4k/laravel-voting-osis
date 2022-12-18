<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;
use Illuminate\Support\Facades\DB;

class RoleService extends WebService
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
        return [
            'guards' => config('guard.name'),
            'permissions' => $this->permissionInterface->all()
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
            $this->roleInterface->create($request);

            toastr()->success('Data role berhasil di tambahkan', 'System');

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
            'role' => $this->roleInterface->findById($id, ['*'], ['permissions'])
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
            'guards' => config('guard.name'),
            'permissions' => $this->permissionInterface->all(),
            'role' => $this->roleInterface->findById($id),
            'role_permissions' => DB::table('role_has_permissions')->where('role_has_permissions.role_id',$id)
                                        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                        ->all()
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
            $this->roleInterface->update($id, $request);

            toastr()->success('Data role berhasil di ubah', 'System');

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
        $this->roleInterface->deleteById($id);

        toastr()->success('Data role berhasil di hapus', 'System');

        return true;
    }
}