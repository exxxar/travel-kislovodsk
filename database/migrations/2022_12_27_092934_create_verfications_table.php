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
        $values = [];

        foreach (\App\Enums\VerificationTypeEnum::cases() as $value) {
            array_push($values, $value->value);
        }

        Schema::create('verifications', function (Blueprint $table) use ($values) {
            $table->id();
            $table->string("message")->nullable();
            $table->unsignedBigInteger("admin_id")->nullable();
            $table->unsignedBigInteger("object_id")->nullable();
            $table->boolean("status")->default(false);
            $table->enum('type', $values);
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
        Schema::dropIfExists('verfications');
    }
};
