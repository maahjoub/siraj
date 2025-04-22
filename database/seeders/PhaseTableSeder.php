<?php

namespace Database\Seeders;

use App\Models\ClassRom;
use App\Models\Phase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhaseTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grads')->delete();
        $phases = [
            ' المرحلة الابتدائية',
            'المرحلة المتوسطة',
            'المرحلة الثانوية',
        ];

        foreach ($phases as $phase) {
            Phase::create([
                'name' => $phase,
                'amount' => 100000
            ]);
        }
    }
}
