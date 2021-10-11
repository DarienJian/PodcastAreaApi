<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->comment('podcast名稱');
            $table->string('copyright', 150)->comment('copyright');
            $table->text('cover_image')->nullable()->comment('封面圖');
            $table->text('description')->nullable()->comment('描述');
            $table->string('rss_link', 300)->comment('rss連結');
            $table->date('last_publish_date')->comment('最後發布日期');
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
        Schema::dropIfExists('podcasts');
    }
}
