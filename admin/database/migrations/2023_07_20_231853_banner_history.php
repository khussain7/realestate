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
        //
        Schema::create('banners_history', function (Blueprint $table) {
            $table->increments('HistoryId');
            $table->integer('PropertyId')->nullable();
            $table->string('PerformActivity')->nullable();
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('banners_history');
    }
       // ...

    /**
     * Set the CreatedBy attribute with the current authenticated user's ID.
     *
     * @param  mixed  $value
     * @return void
     */
    public function setCreatedByAttribute($value)
    {
        $this->attributes['CreatedBy'] = Auth::id();
    }

};
