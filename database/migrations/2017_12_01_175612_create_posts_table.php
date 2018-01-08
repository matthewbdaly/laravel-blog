<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title');
            $table->datetime('pub_date');
            $table->text('text');
            $table->string('slug');
            $table->integer('author_id');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE posts ADD COLUMN searchtext TSVECTOR");
        DB::statement("UPDATE posts SET searchtext = to_tsvector('english', title || '' || text)");
        DB::statement("CREATE INDEX searchtext_gin ON posts USING GIN(searchtext)");
        DB::statement("CREATE TRIGGER ts_searchtext BEFORE INSERT OR UPDATE ON posts FOR EACH ROW EXECUTE PROCEDURE tsvector_update_trigger('searchtext', 'pg_catalog.english', 'title', 'text')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TRIGGER IF EXISTS tsvector_update_trigger ON posts");
        DB::statement("DROP INDEX IF EXISTS searchtext_gin");
        DB::statement("ALTER TABLE posts DROP COLUMN searchtext");
        Schema::dropIfExists('posts');
    }
}
