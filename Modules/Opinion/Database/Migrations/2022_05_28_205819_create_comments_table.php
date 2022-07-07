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
        Schema::create('opinion__comments', function (Blueprint $table) {
            $table->id();

            $table->string('commentable_type')->nullable();
            $table->unsignedBigInteger('commentable_id')->nullable();
            $table->index(['commentable_type', 'commentable_id']);

            $table->string('commented_type')->nullable();
            $table->unsignedBigInteger('commented_id')->nullable();
            $table->index(['commented_type', 'commented_id']);

            $table->longText('body');
            $table->boolean('is_approved')->default(true);

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
        Schema::dropIfExists('comments');
    }
};
