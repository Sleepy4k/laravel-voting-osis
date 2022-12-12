<?php

namespace App\Services\Web\Admin;

use App\Imports\Admin;
use App\Services\WebService;
use Maatwebsite\Excel\Facades\Excel;

class AdminService extends WebService
{
    /**
     * Reset user voting status
     * 
     * @param  int  $user
     * @param  int  $candidate
     * @return boolean
     */
    public function reset($user, $candidate)
    {
        $this->votingInterface->all(['*'], [], [['user_id', $user]])->first()->delete();
        $this->candidateInterface->findById($candidate)->decrement('total_voting');
        $this->userInterface->update($user, [
            'voting_status' => 'false'
        ]);

        return true;
    }

    /**
     * Import user voter data
     * 
     * @param  int  $user
     * @param  int  $candidate
     * @return boolean
     */
    public function import($request)
    {
        try {
            Excel::import(new Admin\UserImport(), $request['excel']);

            toastr()->success('Data pemilih berhasil di import', 'System');

            return true;
        } catch (\Throwable $th) {
            toastr()->error('Data pemilih gagal di import', 'System');

            return false;
        }

    }

    /**
     * Download template
     * 
     * @return boolean
     */
    public function template()
    {
        if (file_exists(public_path('template/pemilih.xlsx'))) {
            response()->download(public_path('template/pemilih.xlsx'));

            toastr()->success('Template berhasil di download', 'System');

            return true;
        }

        toastr()->error('Template belum tersedia', 'System');

        return false;
    }
}