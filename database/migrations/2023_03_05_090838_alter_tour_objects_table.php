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
        Schema::table('tour_objects', function (Blueprint $table) {
            $table->boolean("is_global_template")->default(false)->comment("Глобальный шаблон");
            $table->boolean("is_verified")->default(false)->comment("подверждено администратором");
        });

    }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public
        function down()
        {
            Schema::table('tour_objects', function (Blueprint $table) {
                $table->dropColumn("is_global_template");
                $table->dropColumn("is_verified");
            });
        }
    };
