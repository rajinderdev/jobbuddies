<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlToZoomMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('zoom_meetings')) {
            if (!Schema::hasColumn('zoom_meetings', 'url')) {
                Schema::table('zoom_meetings', function (Blueprint $table) {
                    $table->text('url')->nullable();
                    $table->datetime('endtime')->nullable();
                    $table->text('password')->nullable();
                });
            }
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zoom_meetings', function (Blueprint $table) {
            //
        });
    }
}
