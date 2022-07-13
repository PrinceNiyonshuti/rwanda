<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DistrictSeeder extends Seeder
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
        District::truncate();
        District::create(['province_id' => '1', 'districtName' => 'Nyarugenge']);
        Schema::enableForeignKeyConstraints();
    }
}
