<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('name');
            //$table->text('content_md');

            $table->text('visibility');
            //$table->integer('product_id');
            //添加索引方便查询
            $table->integer('creator_id')->index();
            $table->index(['created_at']);
            $table->integer('template_id');
            $table->integer('jam_id')->nullable();
            $table->integer('post_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
