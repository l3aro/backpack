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
        Schema::create('aoe2notebook_civilizations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('expansion', 100)->nullable();
            $table->string('army_type', 100)->nullable();
            $table->string('team_bonus')->nullable();
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
        Schema::dropIfExists('aoe2notebook_civilizations');
    }
};
