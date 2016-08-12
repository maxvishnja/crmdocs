<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            // We'll need to ensure that MySQL uses the InnoDB engine to
            // support the indexes, other engines aren't affected.
            $table->engine = 'InnoDB';
            $table->unique('name');
        });


        Schema::create('files_groups', function (Blueprint $table) {
            $table->integer('files_id')->unsigned()->index();
            $table->foreign('files_id')->references('id')->on('files')->onDelete('cascade');

            $table->integer('group_id')->unsigned()->index();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
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
        Schema::drop('files');
        Schema::drop('files_groups');
    }
}
