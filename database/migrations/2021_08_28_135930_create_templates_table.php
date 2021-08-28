<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('template_element_id');//thumbnail
            $table->timestamps();

            $table->foreign('template_element_id')->references('id')->on('template_elements')
                ->onUpdate('cascade')->onDelete('restrict');
        });

        Schema::create('templates_templates_elements', function (Blueprint $table) {
            $table->unsignedBigInteger('template_id');
            $table->unsignedBigInteger('template_element_id');

            $table->foreign('template_id')->references('id')->on('templates')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('template_element_id')->references('id')->on('template_elements')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
