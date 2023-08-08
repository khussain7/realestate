<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('agent', function (Blueprint $table) {
            $table->id('AgentId');
            $table->string('AgentContact')->unique();
            $table->string('AgentEmail')->unique();
            $table->unsignedBigInteger('AgentNationality')->nullable();
            $table->string('AgentDescription')->nullable();
            $table->timestamp('AgentDOB')->nullable();
            $table->unsignedBigInteger('AgentJoinDate')->nullable();
            $table->string('Attachments')->nullable();
            $table->string('CurrentStatus')->default('active');
            $table->unsignedBigInteger('CreatedBy')->nullable();
            $table->timestamp('CreateOn')->nullable();
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
        Schema::dropIfExists('agent');
    }
};
