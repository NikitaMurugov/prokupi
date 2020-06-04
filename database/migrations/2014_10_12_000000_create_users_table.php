<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Faker\Factory;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('s_name')->default('');
            $table->string('t_name')->default('');;
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number')->unique();
            $table->string('location')->default('');;
            $table->text('description')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });


        DB::table('users')->insert([
            'name' => 'admin',
            's_name' => ' ',
            't_name' => ' ',
            'email' => 'admin@prokupi.ru',
            'phone_number' => '+7 (111) 111-1111',
            'location' => ' ',
            'description' => ' ',
            'is_admin' => true,
            'password' => Hash::make("admin"),
            'created_at' => now(),
        ]);



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
