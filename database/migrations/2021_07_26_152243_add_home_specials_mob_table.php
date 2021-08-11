<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHomeSpecialsMobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_specials', function (Blueprint $table) {
            $table->string('photo_mob', 250)->nullable();
            $table->string('youtube_photo_mob', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_specials', function (Blueprint $table) {
            $table->dropColumn('photo_mob');
            $table->dropColumn('youtube_photo_mob');
        });
    }
}
