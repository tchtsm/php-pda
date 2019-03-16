<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',10);
            $table->string('password');
            $table->char('account',12)->unique();
            $table->char('qq',15);
            $table->char('phone',11);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('college',15);
            $table->string('major',15);
            $table->unsignedInteger('department_id');
            $table->rememberToken();
            $table->string('last_login_ip',15);
            $table->dateTime('last_login_at');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
