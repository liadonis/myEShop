<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('created_at_ip');
            $table->string('updated_at_ip');
            $table->string("pro_name",60)->unique();
            $table->string("pro_title",60);
            $table->string("pro_detail");
            $table->integer("pro_price");
            $table->integer("cate_id")->unsigned();
            $table->integer("brand_id")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
