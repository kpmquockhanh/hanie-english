<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 100);
            $table->boolean('show');
            $table->string('name');
            $table->text('content')->nullable();
//            $table->text('header_desc_1');
//            $table->text('header_desc_2');
//            $table->text('header_desc_3');
//            $table->text('header_desc_4');
//            $table->text('iframe_video');
//            $table->text('html_section_1');
//            $table->text('html_section_2');
//            $table->text('html_section_3');
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
        Schema::dropIfExists('configs');
    }
}
