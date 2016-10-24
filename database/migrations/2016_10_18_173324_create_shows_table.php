<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index()->primary();
            $table->string('url');
            $table->string('name')->index();
            $table->string('status')->nullable();
            $table->string('nextepisode')->nullable(); //local timezone!
            $table->string('season')->nullable();
            $table->string('number')->nullable();
            $table->string('tvmaze');
            $table->string('imdb')->nullable();
            $table->string('medium')->nullable();
            $table->string('original')->nullable();
            $table->text('summary', 1000)->nullable();
            $table->string('updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shows');
    }
}
