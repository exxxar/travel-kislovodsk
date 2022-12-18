<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_m_s_loggers', function (Blueprint $table) {
            $table->id();
            $table->string("text",255);
            $table->string("phone",255);
            $table->boolean("is_test")->default(false);
            $table->string("status");
            $table->string("sms_id")->nullable();
            $table->string("balance")->nullable();
            $table->string("status_code")->nullable();
            $table->string("status_text")->nullable();
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
        Schema::dropIfExists('s_m_s_loggers');
    }
};
