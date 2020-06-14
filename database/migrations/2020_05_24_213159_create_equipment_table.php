<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('equipment_code');
            $table->text('equipment_image');
            $table->text('equipment_image_64');
            $table->string('equipment_name');
            $table->string('equipment_location');
            $table->integer('equipment_role');
            $table->string('equipment_etc');
            $table->integer('list_id');
            $table->integer('equipment_active')->default(0);
            $table->integer('equipment_status')->default(0);
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
        Schema::dropIfExists('equipment');
    }
}
