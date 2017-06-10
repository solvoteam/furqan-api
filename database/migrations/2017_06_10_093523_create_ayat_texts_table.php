<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyatTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayat_texts', function (Blueprint $table) {
            $table->increments('id');

            $table->text('text');
            $table->unsignedInteger('ayat_number');
            $table->unsignedInteger('translation_id');

            $table->timestamps();

            $table->foreign('ayat_number')->references('number')->on('ayats');
            $table->foreign('translation_id')->references('id')->on('translations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayat_texts');
    }
}
