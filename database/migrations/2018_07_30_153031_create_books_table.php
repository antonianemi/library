<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->char('title', 200);
            $table->char('type_of_paper', 15);
            $table->string('publisher')->nullable();
            $table->char('language', 15);
            $table->char('isbn_10', 15)->nullable();
            $table->char('isbn_13', 15)->nullable();
            $table->char('product_dimensions', 100)->nullable();
            $table->char('weight', 15)->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('books');
    }
}
