<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Candidate::count() == 0) {
            $grades = Candidate::factory(2)->make();

            Candidate::insert($grades->toArray());
        }
    }
}
