<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker\Factory::create("zh_TW");
        $name = ["牛仔褲","上衣","帽子"];
        $price = [299,399,499,599,699,799,899,999];

        for ($i = 0 ; $i < 5 ; $i++)
        {
            $no = $fake->ean8;
            $pro_name = $name[$fake->numberBetween(0,2)];
            $show_price = $price[$fake->numberBetween(0,7)];

            DB::table("products")->insert(
              [
                    "pro_name" => "$pro_name-$no",
                    "pro_title" => "$pro_name-$no",
                    "pro_detail" => $fake->realText(100,2),
                    "pro_price" => $show_price,
                    "cate_id" => $i,
                    "brand_id" => $i,
                    "created_at_ip" => $fake->ipv4,
                    "updated_at_ip" => $fake->ipv4,
                    "created_at" => $fake->date('Y-m-d','now'),
                    "updated_at" => $fake->date('Y-m-d','now'),

              ]
            );
        }


    }
}
