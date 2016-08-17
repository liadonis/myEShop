<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //這一行會在寫入資料前先清空資料表(id從頭開始計算)
//        DB::table("products")->truncate();
//        DB::table("categories")->truncate();
//        DB::table("brands")->truncate();


        // $this->call(UsersTableSeeder::class);

        //若是在Terminal下php artisan db:seed 會執行這邊有寫上的程式
        $this->call(ProductsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
    }
}
