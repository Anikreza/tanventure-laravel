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
            $table->string('first_name_en');
            $table->string('last_name_en');
            $table->string('first_name_bn');
            $table->string('last_name_bn');
            $table->string('gender');
            $table->string('image');
            $table->longText('bio_en');
            $table->longText('types_en');
            $table->longText('bio_bn');
            $table->longText('types_bn');
            $table->string('email')->unique();
            $table->string('role')->default(3)->comment('1 for admin, 2 for staff, 3 for user');
            $table->string('address')->nullable();
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
