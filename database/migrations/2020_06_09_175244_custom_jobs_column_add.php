<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomJobsColumnAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('custom_jobs', function (Blueprint $table) {
            $table->integer('country_id', false, true)->default(0)->after('location');
            $table->integer('state_id', false, true)->default(0)->after('country_id');
            $table->integer('city_id', false, true)->default(0)->after('state_id');
            $table->dropColumn('location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_jobs', function (Blueprint $table) {
            $table->string('location')->nullable()->before('country_id');
            $table->dropColumn('country_id');
            $table->dropColumn('state_id');
            $table->dropColumn('city_id');
        });
    }
}
