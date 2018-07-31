<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToletIdIntoToletImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tolet_images', function (Blueprint $table) {
            $table->integer('tolet_id');
        });

        Schema::table('tolets', function (Blueprint $table) {
            $table->boolean('is_deleted')->default('0');
            $table->dropColumn('isDeleted')->default('0');
            $table->dropColumn('isNegotiable');
            $table->boolean('is_negotiable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tolet_images', function (Blueprint $table) {
            $table->dropColumn('tolet_id');
        });

        Schema::table('tolets', function (Blueprint $table) {
            $table->dropColumn('isDeleted')->default('0');
        });
    }
}
