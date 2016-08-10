<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("phone_number")->unique();
            $table->string("email")->unique();
            $table->timestamps();
        });

        $fake_data = Faker\Factory::create("zh_TW");

        for($i = 0; $i < 10; $i++)
        {
            DB::table("employees")->insert(
                [
                    "name" => $fake_data->name,
                    "phone_number" => $fake_data->phoneNumber,
                    "email" => $fake_data->email
                ]
            );
        }
    }
    



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
