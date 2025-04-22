<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grads')->delete();

        $genders = [
            'ذكر',
            'انثي',

        ];
        foreach ($genders as $gender) {
            Gender::create(['name' => $gender]);
        }
    }
}
