<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id');
            $table->foreignId('author_id');
            $table->string('name');
            $table->string('slug');
            $table->integer('budget')->unsigned()->nullable();
            $table->string('timeframe', 100)->nullable();
            $table->date('last_date')->nullable();
            $table->boolean('live')->nullable()->default(false);
            $table->enum('type', ['onsite', 'offsite'])->nullable();
            $table->text('description');
            $table->text('location')->nullable();
            $table->text('keywords')->nullable();
            $table->boolean('approved')->default(false);
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
        Schema::dropIfExists('projects');
    }
}
