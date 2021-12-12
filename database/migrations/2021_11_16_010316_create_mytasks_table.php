<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMytasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mytasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('labtask_id');
            $table->foreign('labtask_id')->references('id')->on('labtasks')->onDelete('CASCADE');
            $table->string('title', 50);
            $table->string('description', 200)->nullable();
            $table->timestamps();
            $table->date('will_begin_on')->nullable();
            $table->time('will_begin_at')->nullable();
            $table->date('will_finish_on')->nullable();
            $table->time('will_finish_at')->nullable();
            $table->boolean('task_state')->default(0);
            $table->integer('timer_count')->nullable();
            $table->integer('timer_result')->nullable();
            $table->boolean('on_timer_or_not')->nullable();
            $table->boolean('within_timer_count_or_not')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mytasks');
    }
}
