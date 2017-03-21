<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cappings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->text('design_image');
            $table->float('price');
            $table->string('metal_quantity_used')->nullable();
            $table->longText('description');
            $table->boolean('status');
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
        Schema::dropIfExists('cappings');
    }
}
