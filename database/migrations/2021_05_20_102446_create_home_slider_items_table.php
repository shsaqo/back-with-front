<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSliderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_slider_items', function (Blueprint $table) {
            $table->id();
            $table->string('trello', 250)->nullable();
            $table->string('photo', 250);
            $table->integer('order_by')->nullable();
            $table->integer('buy_status')->default(0);
            $table->foreignId('home_slider_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('home_slider_items');
    }
}
