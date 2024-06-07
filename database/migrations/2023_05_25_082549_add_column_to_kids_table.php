<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToKidsTable extends Migration
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
                $table->string('admission_number')->after('name')->nullable();
                $table->integer('assigned_teacher')->after('image')->nullable();
                $table->date('dob')->after('admission_number')->nullable();
                $table->string('gender')->after('dob')->nullable();
                $table->string('place_of_birth')->after('gender')->nullable();
                $table->string('address')->after('place_of_birth')->nullable();
                $table->string('street')->after('address')->nullable();
                $table->string('city')->after('street')->nullable();
                $table->string('country')->after('city')->nullable();
                $table->string('state')->after('country')->nullable();
                $table->string('postcode')->after('state')->nullable();
                $table->string('guardian_relationship')->after('guardian_name')->nullable();
                $table->string('guardian_address')->after('guardian_phone_number')->nullable();
                $table->string('guardian_email')->after('guardian_address')->nullable();
                $table->string('em_parent_name')->after('guardian_email')->nullable();
                $table->string('em_relationship')->after('em_parent_name')->nullable();
                $table->biginteger('em_phone_number')->after('em_relationship')->nullable();
                $table->string('em_email')->after('em_phone_number')->nullable();
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
