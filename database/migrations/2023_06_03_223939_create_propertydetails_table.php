<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('propertydetails', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Property_Name');
            $table->mediumText('Property_Description');
            $table->decimal('Property_Size', 5, 2);
            $table->decimal('Property_Price', 5, 2);	
            $table->integer('Property_Bedrooms');
            $table->integer('Property_Bath');
            $table->string('Property_Category');
            $table->string('Property_Current_Status');
            $table->string('Property_Location');
            $table->string('Property_Images');
            $table->string('Property_Map_Link');
            $table->string('Property_Attachments');
            $table->integer('Created_By');
            //$table->timestamp('Created_At')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('Updated_By');
            //$table->timestamp('Updated_At')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propertydetails');
    }
};
