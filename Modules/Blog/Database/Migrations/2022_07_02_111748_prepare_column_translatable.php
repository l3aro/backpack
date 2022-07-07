<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        $this->updateBlogCategories();
        $this->updateBlogPosts();
    }

    private function updateBlogCategories()
    {
        $tableName = 'blog__categories';
        DB::table($tableName)->chunkById(100, function ($records) use ($tableName) {
            foreach ($records as $record) {
                DB::table($tableName)->where('id', $record->id)->update([
                    'title' => '{}',
                    'description' => '{}',
                    'slug' => '{}',
                    'meta_title' => '{}',
                    'meta_description' => '{}',
                    'meta_keyword' => '{}',
                ]);
                DB::table($tableName)->where('id', $record->id)->update([
                    'title->en' => $record->title,
                    'description->en' => $record->description,
                    'slug->en' => $record->slug,
                    'meta_title->en' => $record->meta_title,
                    'meta_description->en' => $record->meta_description,
                    'meta_keyword->en' => $record->meta_keyword,
                ]);
            }
        });
        Schema::table($tableName, function (Blueprint $table) {
            $table->dropUnique(['slug']);
        });
        Schema::table($tableName, function (Blueprint $table) {
            $table->json('title')->default(null)->change();
            $table->json('description')->default(null)->change();
            $table->json('slug')->default(null)->change();
            $table->json('meta_title')->default(null)->change();
            $table->json('meta_description')->default(null)->change();
            $table->json('meta_keyword')->default(null)->change();
        });
    }

    private function updateBlogPosts()
    {
        $tableName = 'blog__posts';
        DB::table($tableName)->chunkById(100, function ($records) use ($tableName) {
            foreach ($records as $record) {
                DB::table($tableName)->where('id', $record->id)->update([
                    'title' => '{}',
                    'description' => '{}',
                    'content' => '{}',
                    'slug' => '{}',
                    'meta_title' => '{}',
                    'meta_description' => '{}',
                    'meta_keyword' => '{}',
                ]);
                DB::table($tableName)->where('id', $record->id)->update([
                    'title->en' => $record->title,
                    'description->en' => $record->description,
                    'content->en' => $record->content,
                    'slug->en' => $record->slug,
                    'meta_title->en' => $record->meta_title,
                    'meta_description->en' => $record->meta_description,
                    'meta_keyword->en' => $record->meta_keyword,
                ]);
            }
        });
        Schema::table($tableName, function (Blueprint $table) {
            $table->dropUnique(['slug']);
        });
        Schema::table($tableName, function (Blueprint $table) {
            $table->json('title')->default(null)->change();
            $table->json('description')->default(null)->change();
            $table->json('content')->default(null)->change();
            $table->json('slug')->default(null)->change();
            $table->json('meta_title')->default(null)->change();
            $table->json('meta_description')->default(null)->change();
            $table->json('meta_keyword')->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->revertBlogCategories();
        $this->revertBlogPosts();
    }

    private function computeStringLocale($value)
    {
        $locale = config('app.locale');

        return str($value)->between("{\"$locale\": \"", '"}');
    }

    private function revertBlogCategories()
    {
        $tableName = 'blog__categories';
        Schema::table($tableName, function (Blueprint $table) {
            $table->string('title')->change();
            $table->text('description')->nullable()->change();
            $table->string('slug')->change();
            $table->string('meta_title')->nullable()->change();
            $table->string('meta_description')->nullable()->change();
            $table->string('meta_keyword')->nullable()->change();
        });
        DB::table($tableName)->chunkById(100, function ($records) use ($tableName) {
            foreach ($records as $record) {
                DB::table($tableName)->where('id', $record->id)->update([
                    'title' => $this->computeStringLocale($record->title),
                    'description' => $this->computeStringLocale($record->description),
                    'slug' => $this->computeStringLocale($record->slug),
                    'meta_title' => $this->computeStringLocale($record->meta_title),
                    'meta_description' => $this->computeStringLocale($record->meta_description),
                    'meta_keyword' => $this->computeStringLocale($record->meta_keyword),
                ]);
            }
        });
    }

    private function revertBlogPosts()
    {
        $tableName = 'blog__posts';
        Schema::table($tableName, function (Blueprint $table) {
            $table->string('title')->change();
            $table->text('description')->nullable()->change();
            $table->longText('content')->nullable()->change();
            $table->string('slug')->change();
            $table->string('meta_title')->nullable()->change();
            $table->string('meta_description')->nullable()->change();
            $table->string('meta_keyword')->nullable()->change();
        });
        DB::table($tableName)->chunkById(100, function ($records) use ($tableName) {
            foreach ($records as $record) {
                DB::table($tableName)->where('id', $record->id)->update([
                    'title' => $this->computeStringLocale($record->title),
                    'description' => $this->computeStringLocale($record->description),
                    'content' => $this->computeStringLocale($record->content),
                    'slug' => $this->computeStringLocale($record->slug),
                    'meta_title' => $this->computeStringLocale($record->meta_title),
                    'meta_description' => $this->computeStringLocale($record->meta_description),
                    'meta_keyword' => $this->computeStringLocale($record->meta_keyword),
                ]);
            }
        });
    }
};
