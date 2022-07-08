<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Schema::disableForeignKeyConstraints();
        Province::truncate();
        Province::create(['provinceName' => 'Kigali City']);
        Province::create(['provinceName' => 'North']);
        Province::create(['provinceName' => 'South']);
        Province::create(['provinceName' => 'East']);
        Province::create(['provinceName' => 'West']);
        Schema::enableForeignKeyConstraints();
    }
}
