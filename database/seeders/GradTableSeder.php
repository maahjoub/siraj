<?php

namespace Database\Seeders;

use App\Models\Grad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grads')->delete();

        $grads = [
            'القسم الأول',
            'القسم الثاني',
            'القسم الثالث',
            'القسم الرابع',
            'القسم الخامس',
            'القسم السادس',
        ];
        foreach ($grads as $grad) {
            Grad::create(['name' => $grad]);
        }
    }
}
