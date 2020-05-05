<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('category_id');
            $table->string('book_name');
            $table->string('book_image');
            $table->string('book_view');
            $table->string('book_writer');
            $table->string('book_status');
            $table->longText('book_detail');
            $table->Integer('book_amount');
            $table->Integer('book_borrow');
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
        Schema::dropIfExists('items');
    }
}
