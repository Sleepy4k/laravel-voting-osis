<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Menu::count() == 0) {
            $menus = config()->get('menu.admin');
    
            if (empty($menus)) {
                throw new \Exception('Error: config/menu.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
            }

            $menu = collect($menus)->map(function ($menu) {
                return $menu;
            });

            Menu::insert($menu->toArray());
        }
    }
}
