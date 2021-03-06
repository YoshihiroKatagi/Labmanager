<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCfavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfavorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('comment_id')->unsigned()->index();
            $table->timestamps();
            
        $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        $table->foreign('comment_id')->references('id')->on('comments')->onDelete('CASCADE');
        
        $table->unique(['user_id', 'comment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cfavorites');
    }
}
