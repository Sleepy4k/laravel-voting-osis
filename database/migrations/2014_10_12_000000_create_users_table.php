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
        $translate = config()->get('language.list');

        if (empty($translate)) {
            throw new \Exception('Error: config/language.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        $language = config()->get('app.locale');

        if (empty($language)) {
            throw new \Exception('Error: config/app.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        $voting_list = config()->get('voting.list');
        $voting_default = config()->get('voting.default');

        if (empty($voting_list) or empty($voting_default)) {
            throw new \Exception('Error: config/voting.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::create('users', function (Blueprint $table) use ($translate, $language, $voting_list, $voting_default) {
            $table->id();
            $table->string('name');
            $table->string('nis')->unique();
            $table->string('grade');
            $table->enum('language', $translate)->default($language);
            $table->enum('voting_status', $voting_list)->default($voting_default);
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
};
