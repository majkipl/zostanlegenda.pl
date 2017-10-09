<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname', 128);
            $table->string('lastname', 128);
            $table->string('email', 255)->unique();
            $table->date('birthday');
            $table->string('title', 128);
            $table->text('message', 500);
            $table->string('img_tip', 255)->nullable();
            $table->string('video_url', 255)->nullable();
            $table->string('video_type', 255)->nullable();
            $table->string('video_id', 255)->nullable();
            $table->string('video_image_id', 255)->nullable();
            $table->boolean('legal_1')->default(true);
            $table->boolean('legal_2')->default(true);
            $table->boolean('legal_3')->default(true);
            $table->boolean('legal_4')->default(true);
            $table->string('token', 32)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('whence_id');

            $table->foreign('whence_id')->references('id')->on('whences')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contests');
    }
}
