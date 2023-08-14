<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.2023_08_13_223821_propertyimages
     */
    public function up(): void
    {
        //
        Schema::create('propertyimages', function (Blueprint $table) {
            //Recreation and Family
            $table->id('PropertyId');
            $table->string('ImageName');
            $table->string('IsBannner');
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->timestamp('CreateOn')->useCurrent();
            $table->string('UpdateBy')->nullable();
            $table->timestamp('UpdatedOn')->nullable();
            $table->timestamp('CurrentStatus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('propertyimages');
    }
};
