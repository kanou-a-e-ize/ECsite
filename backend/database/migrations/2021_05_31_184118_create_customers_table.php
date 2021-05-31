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
            $table->increments('c_id');
            $table->string('c_name', 100);
            $table->string('c_name_kana', 100);
            $table->integer('postcode')->length(7);
            $table->string('prefecture', 100);
            $table->string('city', 100);
            $table->string('street', 100);
            $table->integer('c_phone')->length(11)->nullable();
            $table->integer('c_mail', 100);
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
