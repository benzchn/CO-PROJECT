<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('equipment_id');
            $table->integer('rent_status')->default(0);
            $table->text('rent_etc')->default(null);
            $table->dateTime('rent_report_date')->default(now());
            $table->date('rent_date')->default(now());
            $table->date('rent_return_date_fix')->default(null);
            $table->date('rent_return_date')->default(null);
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
        Schema::dropIfExists('rents');
    }
}
