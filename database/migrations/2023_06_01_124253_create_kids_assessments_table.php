<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKidsAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('kids_assessments')) {
            Schema::create('kids_assessments', function (Blueprint $table) {
                $table->id();
                $table->biginteger('candidate_id')->nullable();
                $table->biginteger('user_id')->nullable();
                $table->biginteger('task_id')->nullable();
                $table->integer('assessments')->nullable();
                $table->text('remarks')->nullable();
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
        Schema::dropIfExists('kids_assessments');
    }
}
