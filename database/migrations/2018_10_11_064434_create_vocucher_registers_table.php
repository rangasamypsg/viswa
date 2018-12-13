<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVocucherRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocucher_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('email')->unique();
            $table->string('mobile_number', 12)->unique();
            $table->string('check_in', 20);
            $table->string('gender', 20);
            $table->text('address');
            $table->string('country', 50);
            $table->integer('zipcode');
            $table->string('voucher', 10);
            $table->integer('voucher_count');
            $table->integer('redeem_count');
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
        Schema::dropIfExists('vocucher_registers');
    }
}
