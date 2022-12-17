<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class UserService extends WebService
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
            'roles' => $this->roleInterface->all(),
            'grades' => $this->gradeInterface->all()
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
            $this->userInterface->create($request);

            toastr()->success('Data pemilih berhasil di tambahkan', 'System');

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
            'user' => $this->userInterface->findById($id)
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
            'roles' => $this->roleInterface->all(),
            'grades' => $this->gradeInterface->all(),
            'user' => $this->userInterface->findById($id)
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
            $this->userInterface->update($id, $request);

            toastr()->success('Data pemilih berhasil di ubah', 'System');

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
        $this->userInterface->deleteById($id);
        
        toastr()->success('Data pemilih berhasil di hapus', 'System');

        return true;
    }
}