<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormStatusToKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('kids')) {
            Schema::table('kids', function (Blueprint $table) {
                $table->string('user_id')->after('id')->nullable();
                $table->string('form_status')->after('assigned_teacher')->comment("1=> Completed, 0=> Partially Filled");
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kids', function (Blueprint $table) {
            //
        });
    }
}
