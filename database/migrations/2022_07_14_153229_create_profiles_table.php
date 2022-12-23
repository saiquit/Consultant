<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->char('tel', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->text('address')->nullable();
            $table->date('date_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('country', 100)->nullable()->default('Bangladesh');
            $table->string('district', 100)->nullable();
            $table->boolean('complete')->nullable()->default(false);
            $table->string('img')->nullable();
            $table->string('previous_organization', 100)->nullable();
            $table->string('present_organization', 100)->nullable();
            $table->integer('experience')->unsigned()->nullable();
            $table->float('budget')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
