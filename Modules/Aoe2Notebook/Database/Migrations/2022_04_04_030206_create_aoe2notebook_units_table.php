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
        Schema::create('aoe2notebook_units', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('expansion', 100)->nullable();
            $table->json('type')->nullable();
            $table->string('civilization', 100)->nullable();
            $table->string('age', 50)->nullable();
            $table->string('description')->nullable();
            $table->float('training_time')->nullable();
            $table->json('training_cost')->nullable();
            $table->json('trained_at')->nullable();
            $table->unsignedSmallInteger('hit_points')->nullable()->default(0);
            $table->unsignedSmallInteger('attack')->nullable()->default(0);
            $table->unsignedFloat('rate_of_fire')->nullable();
            $table->unsignedSmallInteger('frame_delay')->nullable()->default(0);
            $table->unsignedFloat('attack_delay')->nullable();
            $table->unsignedTinyInteger('minimum_range')->nullable();
            $table->unsignedSmallInteger('range')->nullable();
            $table->unsignedTinyInteger('accuracy')->nullable();
            $table->unsignedTinyInteger('projectile_speed')->nullable();
            $table->unsignedTinyInteger('melee_armor')->nullable()->default(0);
            $table->unsignedTinyInteger('pierce_armor')->nullable()->default(0);
            $table->unsignedFloat('speed')->nullable();
            $table->unsignedTinyInteger('line_of_sight')->nullable()->default(0);
            $table->unsignedBigInteger('upgrade_from_id')->nullable();
            $table->unsignedBigInteger('upgrade_to_id')->nullable();
            $table->json('upgrade_cost')->nullable();
            $table->smallInteger('upgrade_time')->nullable()->default(0);
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
