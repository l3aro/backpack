<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedSmallInteger('hit_points')->default(0);
            $table->unsignedTinyInteger('garrison_capacity')->default(0);
            $table->unsignedSmallInteger('attack')->default(0);
            $table->unsignedFloat('rate_of_fire')->nullable();
            $table->unsignedTinyInteger('minimum_range')->nullable();
            $table->unsignedSmallInteger('range')->nullable();
            $table->unsignedTinyInteger('accuracy')->nullable();
            $table->unsignedTinyInteger('projectile_speed')->nullable();
            $table->unsignedTinyInteger('melee_armor')->default(0);
            $table->unsignedTinyInteger('pierce_armor')->default(0);
            $table->unsignedTinyInteger('line_of_sight')->default(0);
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
