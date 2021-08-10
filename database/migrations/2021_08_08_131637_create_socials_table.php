<?php

use Database\Seeders\SocialSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('social_user', function (Blueprint $table) {
            $table->unsignedBigInteger('social_id');
            $table->unsignedBigInteger('user_id');
            $table->string('link');

            $table->unique(['social_id','user_id']);
            $table->foreign('social_id')->references('id')->on('socials')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Artisan::call('db:seed', [
            '--class' => SocialSeeder::class
        ]); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_user');
        Schema::dropIfExists('socials');
    }
}
