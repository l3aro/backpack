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
        Schema::create('aoe2notebook_units', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('expansion', 100)->nullable();
            $table->string('description')->nullable();
            $table->string('age', 50)->nullable();
            $table->float('training_time')->nullable();
            $table->string('hit_points', 50)->default(0);
            $table->string('attack', 50)->default(0);
            $table->string('rate_of_fire', 50)->nullable();
            $table->string('frame_delay', 50)->nullable();
            $table->string('range', 50)->nullable();
            $table->string('accuracy', 50)->nullable();
            $table->string('projectile_speed', 50)->nullable();
            $table->string('melee_armor', 50)->default(0);
            $table->string('pierce_armor', 50)->default(0);
            $table->string('speed', 50)->nullable();
            $table->string('line_of_sight', 50)->default(0);
            $table->unsignedBigInteger('upgrade_from_id')->nullable();
            $table->unsignedBigInteger('upgrade_to_id')->nullable();
            $table->smallInteger('upgrade_time')->default(0);
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
        Schema::dropIfExists('aoe2notebook_units');
    }
};
