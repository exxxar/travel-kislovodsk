<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->json('content')->nullable();

            $table->unsignedBigInteger("user_id")->nullable();
            $table->unsignedBigInteger("chat_id")->nullable();

            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->unsignedBigInteger('tour_id')->nullable();

            $table->timestamp('read_at')->nullable();


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
        Schema::dropIfExists('messages');
    }
}
