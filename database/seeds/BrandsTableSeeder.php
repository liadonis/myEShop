<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create("zh_TW");
        $name = ["Nike","Adidas","K-swiss"];

        for ($i = 0; $i < 20 ;$i++){
            DB::table("brands")->insert(
                [
                    "brand_name" => $name[$i],
                    "created_at_ip" => $faker->ipv4,
                    "updated_at_ip" => $faker->ipv4,
                    "created_at" => $faker->date('Y-m-d','now'),
                    "updated_at" => $faker->date('Y-m-d','now'),

                ]
            );
        }
    }
}
