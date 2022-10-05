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
        Schema::create('shop__categories', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description')->nullable();
            $table->json('slug');
            $table->boolean('is_published')->default(true);
            $table->json('meta_title')->nullable();
            $table->json('meta_description')->nullable();
            $table->json('meta_keyword')->nullable();
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->unsignedBigInteger('priority')->default(1);
            $table->timestamps();
        });

        Schema::create('shop__products', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50);
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('slug')->nullable();
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
            $table->boolean('is_in_stock')->default(false);
            $table->boolean('is_taxable')->default(false);
            $table->decimal('quantity', 10, 2)->nullable();
            $table->decimal('price', 15, 2, true)->nullable();
            $table->decimal('cost_price', 15, 2, true)->nullable();
            $table->timestamps();
        });

        Schema::create('shop__category_product', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id');
            $table->primary(['category_id', 'product_id']);
            $table->foreign('category_id')
                ->references('id')
                ->on('shop__categories')
                ->cascadeOnDelete();
            $table->foreign('product_id')
                ->references('id')
                ->on('shop__products')
                ->cascadeOnDelete();
        });

        Schema::create('shop__properties', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug');
            $table->string('data_type')->nullable();
            $table->string('field_type', 20)->nullable();
            $table->unsignedBigInteger('priority')->default(1);
            $table->timestamps();
        });

        Schema::create('shop__property_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->string('value');
            $table->timestamps();
            $table->foreign('property_id')
                ->references('id')
                ->on('shop__properties')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop__categories');
        Schema::dropIfExists('shop__products');
        Schema::dropIfExists('shop__property_options');
        Schema::dropIfExists('shop__properties');
    }
};
