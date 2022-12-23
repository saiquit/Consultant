<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('c_name', 255)->nullable();
            $table->text('c_address')->nullable();
            $table->string('c_email')->nullable();
            $table->string('type')->nullable();
            $table->string('contact_person')->nullable();
            $table->char('tel', 255)->nullable();
            $table->boolean('complete')->nullable()->default(false);
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
        Schema::dropIfExists('company_profiles');
    }
}
