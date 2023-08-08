<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('propertyowner', function (Blueprint $table) {
            $table->unsignedBigInteger('PropertyId')->nullable();
            $table->unsignedBigInteger('OwnerId')->nullable();
            $table->string('Notes')->nullable();
            $table->string('Attachments')->nullable();
            $table->string('CurrentStatus')->default('active');
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->timestamp('CreateOn')->nullable();
            $table->unsignedBigInteger('UpdateBy')->nullable();
            $table->timestamp('UpdatedOn')->nullable();
            $table->timestamps();
            //$table->foreign('CreatedBy')->references('id')->on('users')->onDelete('set null');
           // $table->primary(['OwnerId', 'PropertyId']);
            
        });
    }    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propertyowner');
    }
};
