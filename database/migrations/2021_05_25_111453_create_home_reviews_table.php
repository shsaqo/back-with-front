<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250)->nullable();
            $table->string('user_photo', 250)->nullable();
            $table->text('message')->nullable();
            $table->float('star')->default(0);
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
        Schema::dropIfExists('home_reviews');
    }
}
