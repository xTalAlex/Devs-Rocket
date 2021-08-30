<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_elements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->timestamps();    
            
            $table->foreign('template_id')->references('id')->on('templates')
                ->onUpdate('cascade')->onDelete('set null');
        });

        Schema::table('templates', function (Blueprint $table) {
            $table->unsignedBigInteger('template_element_id')->nullable(); 
        
            $table->foreign('template_element_id')->references('id')->on('template_elements')
                ->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('templates', function($table) {
            $table->dropForeign('templates_template_element_id_foreign');
            $table->dropColumn('template_element_id');
         });
        Schema::dropIfExists('template_elements');
    }
}
