<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
        $imagePath = 'sponsors/' . $faker->unique()->word . '.jpg';
        $imageContent = $faker->image(null, 400, 300, 'business', true, true, 'sponsor');
        Storage::disk('public')->put($imagePath, file_get_contents($imageContent));

        for ($i=0; $i < 16; $i++) {
            # code...
            DB::table('sponsors')->insert([
                'name' => $faker->company,
                'email' => $faker->unique()->companyEmail,
                'email_verified_at' => now(),
                'password' => bcrypt('11111111'),
                'description' => $faker->paragraph,
                'image'=> $imagePath,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
