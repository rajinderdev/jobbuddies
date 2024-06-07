<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoomMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoom_meetings', function (Blueprint $table) {
            $table->id();
            $table->integer('zoom_meeting_id')->nullable();
            $table->integer('interviewer_id')->nullable();
            $table->integer('candidate_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('start_time')->nullable();
            $table->string('duration')->nullable();
            $table->string('topic')->nullable();
            $table->string('agenda')->nullable();
            $table->string('host_video')->nullable();
            $table->string('participant_video')->nullable();
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
        Schema::dropIfExists('zoom_meetings');
    }
}
