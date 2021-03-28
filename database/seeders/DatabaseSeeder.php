<?php

namespace Database\Seeders;

use App\Models\Raza;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        include "razas.php";
        foreach ($razas as $raza) {
            DB::table('razas')->insert([
                'name'        => $raza,
            ]);
        }
    }
}
