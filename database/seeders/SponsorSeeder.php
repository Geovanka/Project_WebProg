<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        for ($i=1; $i < 5; $i++) {
            # code...
            DB::table('sponsors')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->safeEmail,
                'description' => $faker->paragraph,
                'password' => bcrypt('password'),
                'email_verified_at' => now()
            ]);
        }
    }
}
