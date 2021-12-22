<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLtfavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ltfavorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('labtask_id')->unsigned()->index();
            $table->timestamps();
            
        $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        $table->foreign('labtask_id')->references('id')->on('labtasks')->onDelete('CASCADE');
        
        $table->unique(['user_id', 'labtask_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ltfavorites');
    }
}
