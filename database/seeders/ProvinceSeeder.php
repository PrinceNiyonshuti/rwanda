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
        Province::create(['provinceName' => 'Northern Province']);
        Province::create(['provinceName' => 'Southern Province']);
        Province::create(['provinceName' => 'Eastern Province']);
        Province::create(['provinceName' => 'Western Province']);
        Schema::enableForeignKeyConstraints();
    }
}
