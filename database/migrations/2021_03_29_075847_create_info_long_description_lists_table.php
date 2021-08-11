<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoLongDescriptionListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_long_description_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->text('info_long_description')->nullable();
            $table->string('info_long_description_photo', 250)->nullable();
            $table->integer('info_long_description_type')->default(0);
            $table->text('info_long_description_text')->nullable();
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
        Schema::dropIfExists('info_long_description_lists');
    }
}
