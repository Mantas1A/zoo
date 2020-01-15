<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStuffToBirdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('birds', function (Blueprint $table) {
            $table->string('category');
            $table->string('item_name');
            $table->text('description');
            $table->integer('quantity');
            $table->string('dimensions')->default(null);
            $table->float('price');
            $table->string('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('birds', function (Blueprint $table) {
            //
        });
    }
}
