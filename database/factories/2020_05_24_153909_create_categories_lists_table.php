<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('list_title');
            $table->string('categories_code');
            $table->decimal('list_price_per_unit');
            $table->string('list_get');
            $table->string('list_fiscalyear');
            $table->integer('list_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_lists');
    }
}
