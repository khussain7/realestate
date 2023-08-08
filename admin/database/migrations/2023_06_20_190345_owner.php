<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('owner', function (Blueprint $table) {
            $table->id('OwnerId');
            $table->string('PropertyOwnerContact')->unique();
            $table->string('PropertyOwnerEmail')->unique();
            $table->unsignedBigInteger('PropertyOwnerNationality')->nullable();
            $table->string('PropertyOwnerNotes')->nullable();
            $table->string('Attachments')->nullable();
            $table->string('CurrentStatus')->default('active');
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->timestamp('CreateOn');
            $table->unsignedBigInteger('UpdateBy')->nullable();
            $table->timestamp('UpdatedOn')->nullable();
            $table->timestamps();
            // $table->foreign('CreatedBy')->references('id')->on('users')->onDelete('set null');
        });
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owner');
    }
};
