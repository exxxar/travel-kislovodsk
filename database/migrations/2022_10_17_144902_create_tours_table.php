<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->double('base_price')->default(0);
            $table->double('discount_price')->default(0);
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('start_city', 255)->nullable();
            $table->string('start_address', 255)->nullable();
            $table->boolean('comfort_loading')->default(false)->comment("Перевозчика забирает от указанного места");
            $table->double('start_latitude')->default('0');
            $table->double('start_longitude')->default('0');
            $table->text('start_comment')->nullable();

            $table->string('preview_image', 255)->nullable();
            $table->boolean('is_hot')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_draft')->default(true);
           // $table->double('rating')->default('0');
            $table->string('duration')->nullable();

            $table->integer('min_group_size')->default(0)->nullable();
            $table->integer('max_group_size')->default(0)->nullable();

            $table->json('images')->nullable();
            $table->json('payment_infos')->nullable();
            $table->json('prices')->nullable();
            $table->json('include_services')->nullable();
            $table->json('exclude_services')->nullable();
            $table->unsignedBigInteger('duration_type_id')->nullable();
            $table->unsignedBigInteger('movement_type_id')->nullable();
            $table->unsignedBigInteger('tour_type_id')->nullable();
            $table->unsignedBigInteger('payment_type_id')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();

            $table->timestamp('verified_at')->nullable();
            $table->foreign('duration_type_id')
                ->references('id')
                ->on('dictionaries');
            $table->foreign('movement_type_id')
                ->references('id')
                ->on('dictionaries');
            $table->foreign('tour_type_id')
                ->references('id')
                ->on('dictionaries');
            $table->foreign('payment_type_id')
                ->references('id')
                ->on('dictionaries');
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
        Schema::dropIfExists('tours');
    }
}
