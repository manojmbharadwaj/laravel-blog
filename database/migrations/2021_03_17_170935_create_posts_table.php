<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id')->index();
            $table->bigInteger('category_id')->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('post');
            $table->timestamps();
            $table->string('status', 20)->index()->default('DRAFT')->comment('POSTED, DRAFT, INACTIVE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
