<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_groups', function (Blueprint $table) {
            $table->id();
            $table->timestamp('registration_at');
            $table->timestamp('start_at');
            $table->timestamp('return_at');
            $table->json('date_and_method_informing');
            $table->json('date_and_method_communication_sessions');
            $table->unsignedBigInteger('tourist_agency_id');
            $table->integer('summary_members_count')->default(0);
            $table->json('children_ages')->nullable();
            $table->integer('children_count')->default(0);
            $table->integer('foreigners_count')->default(0);
            $table->json('foreigners_countries')->nullable();
            $table->string('start_point', 255);
            $table->string('final_destination_point', 255);
            $table->double('route_distance')->default('0');
            $table->json('areas_of_rf');
            $table->json('lodging_points');
            $table->json('emergency_exit_routes');
            $table->json('dangerous_route_sections');
            $table->string('difficulty_category');
            $table->string('travel_type');
            $table->string('type_of_transport');
            $table->json('mobile_phones');
            $table->json('satellite_phones');
            $table->json('radio_stations');
            $table->json('charge_batteries');
            $table->json('first_aid_equipments');
            $table->json('medical_professionals')->nullable();
            $table->string('insurance')->nullable();
            $table->json('additional_info')->nullable();
            $table->unsignedBigInteger('tourist_guide_id');
            $table->foreign('tourist_agency_id')
                ->references('id')
                ->on('tourist_agencies');
            $table->foreign('tourist_guide_id')
                ->references('id')
                ->on('tourist_guides');
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
        Schema::dropIfExists('tourist_groups');
    }
}
