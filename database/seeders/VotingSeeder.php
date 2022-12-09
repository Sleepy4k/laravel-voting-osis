<?php

namespace Database\Seeders;

use App\Models\Voting;
use Illuminate\Database\Seeder;

class VotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Voting::count() == 0) {
            $grades = Voting::factory(10)->make();

            Voting::insert($grades->toArray());
        }
    }
}
