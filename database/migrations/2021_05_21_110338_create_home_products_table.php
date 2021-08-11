<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_products', function (Blueprint $table) {
            $table->id();
            $table->string('trello', 250)->nullable();
            $table->string('name', 250);
            $table->float('price');
            $table->float('old_price');
            $table->integer('sale');
            $table->integer('status')->default(1);
            $table->integer('order_by')->nullable();
            $table->string('photo', 250);
            $table->text('youtube')->nullable();
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
        Schema::dropIfExists('home_products');
    }
}
