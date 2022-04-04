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
        Schema::create('aoe2notebook_structures', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('expansion', 100)->nullable();
            $table->string('age', 50)->nullable();
            $table->smallInteger('population')->default(0);
            $table->smallInteger('build_time')->default(0);
            $table->string('size', 50)->nullable();
            $table->string('hit_points', 50)->nullable();
            $table->unsignedTinyInteger('garrison_capacity')->default(0);
            $table->string('attack', 50)->nullable();
            $table->string('rate_of_fire', 50)->nullable();
            $table->string('range', 50)->nullable();
            $table->string('minimum_range', 50)->nullable();
            $table->string('accuracy', 50)->nullable();
            $table->string('projectile_speed', 50)->nullable();
            $table->string('melee_armor', 50)->default(0);
            $table->string('pierce_armor', 50)->default(0);
            $table->string('speed', 50)->nullable();
            $table->string('line_of_sight', 50)->default(0);
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
        Schema::dropIfExists('aoe2notebook_structures');
    }
};
