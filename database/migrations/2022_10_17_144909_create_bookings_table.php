<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('group_chat_id')->nullable();
            $table->unsignedBigInteger('schedule_id')->nullable();
            $table->json('selected_prices');
            $table->json('additional_services')->nullable();
            $table->string('fname', 255);
            $table->string('sname', 255)->nullable();
            $table->string('tname', 255);
            $table->integer('age')->default(0);
            $table->string('document_info', 255)->nullable();
            $table->string('document_type_title', 255)->nullable();
            $table->string('phone', 50);
            $table->string('email', 255);

            $table->timestamp('start_at');
            $table->foreign('tour_id')
                ->references('id')
                ->on('tours');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('transaction_id')
                ->references('id')
                ->on('transactions');



            $table->foreign('group_chat_id')
                ->references('id')
                ->on('chats');


            $table->softDeletes();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
