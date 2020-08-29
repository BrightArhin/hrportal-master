<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHODCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_o_d_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('comment_id')->unsigned()->nullable();
            $table->text('message')->nullable();
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('set null');
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
        Schema::dropIfExists('h_o_d_comments');
    }
}
