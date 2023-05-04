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
        Schema::create('book_genre', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id')->unsigned();
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->bigInteger('genre_id')->unsigned();
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
        Schema::table('books', function (Blueprint $table) {
            $table->bigInteger('author_id')->unsigned();
            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_genres');
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropColumn('author_id');
        });
    }
};
