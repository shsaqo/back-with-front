<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('status')->default(1);
            $table->text('url');
            $table->string('color')->nullable();
            $table->string('name', 250);
            $table->string('description', 250)->nullable();
            $table->string('description_color', 250)->nullable();
            $table->string('photo', 250);
            $table->integer('sale');
            $table->float('old_price')->nullable();
            $table->float('price');
            $table->integer('count');
            $table->integer('sale_time_one_status')->default(0);
            $table->integer('sale_time_two_status')->default(0);
            $table->text('info_short_description_important_text')->nullable();
            $table->text('youtube_link')->nullable();
            $table->integer('how_to_order_type')->default(0);
            $table->text('last_name')->nullable();
            $table->string('last_photo', 250)->nullable();
            $table->integer('phone_type')->default(0);
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
        Schema::dropIfExists('products');
    }
}
