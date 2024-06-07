<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateinterviewerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('interviewers')) {
            Schema::create('interviewers', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id')->nullable();
                $table->string('interviewer_id',150)->nullable();
                $table->string('name',255);
                $table->integer('disease')->nullable();
                $table->string('image',255)->nullable();
                $table->string('assign_class',255)->nullable();
                $table->string('gender',50)->nullable();
                $table->date('dob')->nullable();
                $table->biginteger('phone')->nullable();
                $table->date('joining_date')->nullable();
                $table->string('qualification',255)->nullable();
                $table->string('department',255)->nullable();
                $table->string('designation',255)->nullable();
                $table->string('experience',255)->nullable();
                $table->string('address',255)->nullable();
                $table->string('city',255)->nullable();
                $table->string('country',255)->nullable();
                $table->string('state',255)->nullable();
                $table->string('zipcode',255)->nullable();
                $table->integer('status')->default(1)->comment("1=> Active, 0=> Inactive")->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('interviewer');
    }
}
