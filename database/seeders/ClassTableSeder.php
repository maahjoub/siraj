<?php

namespace Database\Seeders;

use App\Models\Phase;
use App\Models\ClassRom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_roms')->delete();

        $classes = [
            'الصف الأول اساس',
            'الصف الثاني اساس',
            'الصف الثالث اساس',
            'الصف الرابع اساس',
            'الصف الخامس اساس',
            'الصف السادس اساس',
        ];
        foreach ($classes as $key=>$class) {
            ClassRom::create([
                'name' => $class,
                'phase_id' => 1
            ]);
        }

        
        $classes = [
            ' الصف الأول متوسطة ',
            'الصف الثاني متوسطة ',
            'الصف الثالث متوسطة ',
        ];
        foreach ($classes as $key=>$class) {
            ClassRom::create([
                'name' => $class,
                'phase_id' => 2
            ]);
        }

        $classes = [
            'الصف الأول الثانوي',
            'الصف الثاني الثانوي',
            'الصف الثالث الثانوي',
        ];
        foreach ($classes as $key=>$class) {
            ClassRom::create([
                'name' => $class,
                'phase_id' => 3
            ]);
        }
    }
}
