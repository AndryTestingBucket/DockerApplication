<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStripesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripes', function (Blueprint $table) {
            $table->id();
            $table->string('client_id');
            $table->string('object');
            $table->integer('amount');
            $table->text('client_secret');
            $table->string('capture_method');
            $table->string('confirmation_method');
            $table->integer('created');
            $table->string('currency');
            $table->string('payment_method_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stripes');
    }
}
