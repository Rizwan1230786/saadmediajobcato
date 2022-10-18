<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VerificationFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('verification_files')) {
            Schema::create('verification_files', function (Blueprint $table) {
                $table->integer('id', true, true);
                $table->string('full_path');
                $table->string('file_name');
                $table->bigInteger('company_id', false, true);
                $table->text('comment')->nullable();
                $table->boolean('status')->Default(0);
                $table->timestamps();

                $table->foreign('company_id')->references('id')->on('companies');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('verification_files')) {
            Schema::table('verification_files', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
            });
            Schema::drop('verification_files');
        }
    }
}
