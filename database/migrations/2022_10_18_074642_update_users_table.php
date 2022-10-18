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
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique('users_email_unique');
            $table->string('phone', 50)->after('name');
            $table->string('old_password')->nullable()->after('password');
            $table->unsignedBigInteger('company_id')->nullable()->after('old_password');
            $table->unsignedBigInteger('user_law_status_id')->after('company_id');
            $table->unsignedBigInteger('profile_id')->after('user_law_status_id');
            $table->string('sms_code')->nullable()->after('profile_id');
            $table->boolean('sms_notification')->default(true)->after('sms_code');
            $table->boolean('email_notification')->default(true)->after('sms_notification');
            $table->timestamp('verified_at')->nullable()->after('email_notification');
            $table->timestamp('blocked_at')->nullable()->after('verified_at');
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
            $table->foreign('user_law_status_id')
                ->references('id')
                ->on('dictionaries');
            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
