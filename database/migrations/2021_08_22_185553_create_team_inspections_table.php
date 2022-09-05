<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_inspections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('event_id');
            $table->bigInteger('leader_id');
            $table->bigInteger('member1_id')->nullable();
            $table->bigInteger('member2_id')->nullable();
            $table->string('name');
            $table->string('school');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('team_inspections');
    }
}
