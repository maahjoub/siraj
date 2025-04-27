<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(PhaseTableSeder::class);
        $this->call(ClassTableSeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(GradTableSeder::class);

        User::create([
            'name' => 'محجوب محمد الطاهر',
            'username' => 'jouby',
            'phone' => '0903380371',
            'email' => 'am470593@gmail.com',
            'password' => bcrypt('123123123')
        ]);

        

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
