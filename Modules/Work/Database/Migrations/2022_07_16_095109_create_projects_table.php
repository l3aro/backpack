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
        Schema::create('work__projects', function (Blueprint $table) {
            $table->id();
            $table->json('title')->default(null);
            $table->json('description')->default(null);
            $table->json('slug')->default(null);
            $table->unsignedBigInteger('priority')->default(1);
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
        Schema::dropIfExists('work__projects');
    }
};
