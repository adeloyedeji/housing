<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('state');
            $table->integer('area');
            $table->string('exact_location');
            $table->date('move_on');
            $table->string('room_type');
            $table->integer('min_rent')->default(20000);
            $table->integer('max_rent');
            $table->integer('min_bed')->default(1);
            $table->integer('max_bed');
            $table->integer('min_toilet')->default(1);
            $table->integer('max_toilet');
            $table->integer('min_bath')->default(1);
            $table->integer('max_bath');
            $table->integer('total_units')->nullable();
            $table->boolean('ad_contact');
            $table->timestamps();

            $table->foreign('state')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('area')->references('id')->on('areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}