<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThankYousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thank_yous', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->float('price');
            $table->float('old_price');
            $table->integer('sale');
            $table->string('photo', 250);
            $table->json('description')->nullable();
            $table->json('attached')->nullable();
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
        Schema::dropIfExists('thank_yous');
    }
}
