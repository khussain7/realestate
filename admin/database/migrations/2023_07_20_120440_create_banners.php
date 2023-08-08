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
        Schema::create('banners', function (Blueprint $table) {
            $table->id('PropertyId');
            $table->string('BannerImage')->nullable();
            $table->timestamp('StartedDate')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('EndDate')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('CurrentStatus')->nullable();
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->timestamp('CreateOn')->useCurrent();
            $table->string('UpdateBy')->nullable();
            $table->timestamp('UpdatedOn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
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

    // ...
};
