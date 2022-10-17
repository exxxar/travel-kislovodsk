<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tour_id')->nullable();
            $table->unsignedBigInteger('tour_guide_id')->nullable();
            $table->text('comment');
            $table->json('images')->nullable();
            $table->double('rating')->default('0');
            $table->foreign('tour_id')
                ->references('id')
                ->on('tours');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('tour_guide_id')
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
        Schema::dropIfExists('reviews');
    }
}
