<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ApplicationSeeder::class,
            LanguageSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            GradeSeeder::class,
            UserSeeder::class,
            CandidateSeeder::class,
            VotingSeeder::class,
            MenuSeeder::class,
            PageSeeder::class
        ]);
    }
}
