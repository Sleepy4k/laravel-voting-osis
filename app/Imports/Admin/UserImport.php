<?php

namespace App\Imports\Admin;

use App\Models\User;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return User::create([
            'name'                      => $row['nama'],
            'nis'                       => $row['nis'],
            'grade'                     => $row['kelas'],
            'language'                  => 'id',
            'password'                  => $row['password']
        ])->assignRole('user');
    }

    public function rules(): array
    {
        return [
            'nama' => ['required','max:255'],
            'nis' => ['required','unique:users,nis'],
            'kelas' => ['required','max:255'],
            'password' => ['required','min:8','max:255']
        ];
    }
}