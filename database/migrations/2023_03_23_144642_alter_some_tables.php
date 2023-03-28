<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tour_objects', function (Blueprint $table) {
            $table->string("country")->nullable();
            $table->string("pogoda_klimat_id")->nullable();
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->double("global_discount")->nullable();
        });

        Schema::table('tours', function (Blueprint $table) {
            $table->string("country")->nullable();
            $table->boolean("need_email_notification")->default(false)
                ->comment("Оповещать покупателей о старте тура за день через email");
            $table->boolean("need_sms_notification")
                ->default(false)->comment("Оповещать покупателей о старте тура за день через sm");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tour_objects', function (Blueprint $table) {
            $table->dropColumn("country");
            $table->dropColumn("pogoda_klimat_id");
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn("global_discount");
        });

        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn("country");
            $table->dropColumn("need_email_notification");
            $table->dropColumn("need_sms_notification");
        });
    }
};
