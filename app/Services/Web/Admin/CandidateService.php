<?php

namespace App\Services\Web\Admin;

use App\Services\WebService;

class CandidateService extends WebService
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return [
            'candidates' => $this->candidateInterface->all()
        ];
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
            if (!empty($request['image'])) {
                $request['image'] = $this->saveSingleFile('image', $request['image']);
            }
    
            $this->candidateInterface->create($request);

            toastr()->success('Data calon kandidat berhasil di tambahkan', 'System');

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
            'candidate' => $this->candidateInterface->findById($id)
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
            'candidate' => $this->candidateInterface->findById($id)
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
            $candidate = $this->candidateInterface->findById($id);

            if (empty($candidate)) {
                return false;
            }

            if (!empty($request['image'])) {
                $request['image'] = $this->updateSingleFile('image', $request['image'], $candidate->image);
            }
            
            $candidate->update($request);

            toastr()->success('Data calon kandidat berhasil di ubah', 'System');

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
        $candidate = $this->candidateInterface->findById($id);
        
        if (!empty($candidate->image)) {
            $this->deleteFile('image', $candidate->image);
        }

        $candidate->delete();
        
        toastr()->success('Data calon kandidat berhasil di hapus', 'System');

        return true;
    }
}