<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConfigLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('image', 191);
            $table->integer('lesson_number')->nullable();
            $table->integer('duration_by_week')->nullable();
            $table->bigInteger('created_by');
            $table->text('desc');
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
        Schema::dropIfExists('config_levels');
    }
}
