<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'core__settings';
        DB::table($tableName)->chunkById(100, function ($records) use ($tableName) {
            foreach ($records as $record) {
                DB::table($tableName)->where('id', $record->id)->update([
                    'value' => '{}',
                ]);
                DB::table($tableName)->where('id', $record->id)->update([
                    'value->en' => str($record->value)->trim('"')->toString(),
                ]);
            }
        });
    }

    private function computeStringLocale($value)
    {
        $locale = config('app.locale');

        return str($value)->between("{\"$locale\": \"", '"}');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableName = 'core__settings';
        DB::table($tableName)->chunkById(100, function ($records) use ($tableName) {
            foreach ($records as $record) {
                DB::table($tableName)->where('id', $record->id)->update([
                    'value' => $this->computeStringLocale($record->value),
                ]);
            }
        });
    }
};
