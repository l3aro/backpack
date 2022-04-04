<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aoe2notebook_technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('expansion', 100)->nullable();
            $table->string('description')->nullable();
            $table->string('age', 50)->nullable();
            $table->unsignedSmallInteger('research_time')->nullable();
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
        Schema::dropIfExists('aoe2notebook_technologies');
    }
};
