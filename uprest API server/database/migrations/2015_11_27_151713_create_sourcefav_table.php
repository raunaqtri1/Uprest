<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcefavTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
         Schema::create('article_source', function (Blueprint $table) {
         $table->integer('article_id')->unsigned();
            $table->integer('source_id')->unsigned();
            $table->timestamps();
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('source_id')->references('id')->on('sources');
            $table->primary(['article_id', 'source_id']);
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article_source');
    }

}
