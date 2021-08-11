<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('product_permission')->default(0);
            $table->integer('special_permission')->default(0);
            $table->integer('domain_permission')->default(0);
            $table->string('position', 250)->nullable();
            $table->integer('status')->default(0);
            $table->string('avatar', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('product_permission');
            $table->dropColumn('special_permission');
            $table->dropColumn('domain_permission');
            $table->dropColumn('position');
            $table->dropColumn('status');
        });
    }
}
