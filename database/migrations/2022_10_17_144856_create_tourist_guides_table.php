<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_guides', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('tname', 255);
            $table->string('sname', 255)->nullable();
            $table->json('relative_contact_information');
            $table->string('mobile_phone', 50);
            $table->string('office_phone', 50)->nullable();
            $table->string('home_phone', 50)->nullable();
            $table->string('address', 255);
            $table->date('birthday');
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
        Schema::dropIfExists('tourist_guides');
    }
}
