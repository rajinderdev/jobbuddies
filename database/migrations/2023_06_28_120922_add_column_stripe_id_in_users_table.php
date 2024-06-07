<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnStripeIdInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('users')) {
            if (Schema::hasColumn('users', 'role')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->integer('role')->comment("1=>Admin, 2=>Teacher, 3=>Kid, 4=Frontend User, 5=School Admin, 6=>Fundraising")->nullable()->change();
                });
            }
            if (!Schema::hasColumn('users', 'stripe_id')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->string('stripe_id',255)->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
