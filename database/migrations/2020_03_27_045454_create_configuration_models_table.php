<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_website');
            $table->string('logo');
            $table->string('logo_white');
            $table->string('icon');
            $table->string('email');
            $table->string('phone_number');
            $table->longText('about_us')->nullable();
            $table->longText('about_short')->nullable();
            $table->string('youtube_link')->nullable();
            $table->longText('organization')->nullable();
            $table->string('modal_status')->nullable();
            $table->longText('modal_image')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->string('address_address')->nullable();
            $table->double('address_latitude')->nullable();
            $table->double('address_longitude')->nullable();
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
        Schema::dropIfExists('configuration_models');
    }
}
