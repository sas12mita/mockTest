<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tenants', function (Blueprint $table) {
             $table->id();
            $table->string('full_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('desired_subdomain');
            $table->string('institution_name');
            $table->string('keywords');
            $table->string('database')->unique()->nullable(); // eg: sayogi_company1
            $table->enum('status',['approved','decline'])->default('decline');
            $table->integer('days')->nullable();
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
        Schema::dropIfExists('tenants');
    }
};
