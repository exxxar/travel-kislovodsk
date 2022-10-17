<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 255);
            $table->date('birthday');
            $table->string('address', 255);
            $table->string('phone', 50);
            $table->unsignedBigInteger('tourist_group_id');
            $table->foreign('tourist_group_id')
                ->references('id')
                ->on('tourist_groups');
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
        Schema::dropIfExists('toursist_members');
    }
}
