<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * @31 #foreignkey #dropforeignkey
 */
class AddForeignKeysToArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_tag', function (Blueprint $table) {
            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade");
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_tag', function (Blueprint $table) {
            $table->dropForeign("article_tag_article_id_foreign");
            $table->dropForeign("article_tag_tag_id_foreign");
        });
    }
}
