<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->Increments('c_id');
            $table->string('c_name', 100);
            $table->string('c_name_kana', 100);
            $table->Integer('postcode')->length(7);
            $table->string('prefecture', 100);
            $table->string('city', 100);
            $table->string('street', 100);
            $table->string('c_phone', 11)->nullable();
            $table->string('c_mail', 100);
            $table->Integer('c_p_id');
            $table->string('c_p_name', 100);
            $table->Integer('c_p_price');
            $table->Integer('c_p_number');
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
        Schema::dropIfExists('customers');
    }
}
