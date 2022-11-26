<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_objects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('city', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->double('latitude')->default('0');
            $table->double('longitude')->default('0');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('creator_id');
            $table->json('photos')->nullable();
            $table->foreign('creator_id')
                ->references('id')
                ->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('tour_objects');
    }
}
