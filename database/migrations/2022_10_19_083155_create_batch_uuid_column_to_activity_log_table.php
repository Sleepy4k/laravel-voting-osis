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
        $table_name = config()->get('activitylog.table_name');

        if (empty($table_name)) {
            throw new \Exception('Error: config/activitylog.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::table($table_name, function (Blueprint $table) {
            $table->uuid('batch_uuid')->nullable()->after('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table_name = config()->get('activitylog.table_name');

        if (empty($table_name)) {
            throw new \Exception('Error: config/activitylog.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::table($table_name, function (Blueprint $table) {
            $table->dropColumn('batch_uuid');
        });
    }
};
