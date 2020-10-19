<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
   Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('relative_name');
            $table->string('relation');
            $table->string('phone');
            $table->string('mob');
            $table->string('what_mob');
            $table->string('telg_mob');
            $table->bigInteger('adar');
            $table->integer('pin');
            $table->longText('address');
            $table->string('country');
            $table->string('state');
            $table->string('dist');
            $table->string('taluk');
            $table->string('village');
            $table->string('email')->unique();
            $table->string('token');
            $table->string('what_otp');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
