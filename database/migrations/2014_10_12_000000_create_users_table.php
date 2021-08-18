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
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('usertype')->nullable();
            $table->string('role')->nullable();
            $table->string('salary')->nullable();
            $table->string('address')->nullable();
            $table->integer('designation_id')->nullable();
            $table->integer('gender_id')->nullable();
            $table->integer('staff_id')->nullable();
            $table->integer('religion_id')->nullable();
            $table->string('mobile',20)->unique()->nullable();
            $table->string('education')->nullable();
            $table->string('nid')->nullable();
            $table->string('dob')->nullable();
            $table->string('code')->nullable();
            $table->string('join_date')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('singnature')->nullable();
            $table->string('status')->nullable();
            $table->string('f_name',50)->nullable();
            $table->string('f_mobile',20)->nullable();
            $table->string('f_occupation',20)->nullable();
            $table->string('f_image')->nullable();
            $table->string('m_name')->nullable();
            $table->string('m_mobile')->nullable();
            $table->string('m_occupation',50)->nullable();
            $table->string('m_image')->nullable();
            $table->string('gardian_name',50)->nullable();
            $table->string('gardian_mobile',20)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
