<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('path', 255);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->timestamp('valid_to')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
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
        Schema::dropIfExists('documents');
    }
}
