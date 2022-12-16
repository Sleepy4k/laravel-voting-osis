<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Application::count() == 0) {
            Application::create([
                'app_name' => config('app.name'),
                'meta_author' => config('meta.author'),
                'meta_keywords' => config('meta.keyword'),
                'meta_description' => config('meta.description')
            ]);
        }
    }
}
