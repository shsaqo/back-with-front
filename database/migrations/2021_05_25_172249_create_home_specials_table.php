<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSpecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_specials', function (Blueprint $table) {
            $table->id();
            $table->string('trello', 250)->nullable();
            $table->string('photo', 250)->nullable();
            $table->string('youtube_photo', 250)->nullable();
            $table->text('youtube')->nullable();
            $table->integer('order_by')->nullable();
            $table->integer('type')->default(0);
            $table->float('price');
            $table->integer('sale');
            $table->float('old_price');
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
        Schema::dropIfExists('home_specials');
    }
}
