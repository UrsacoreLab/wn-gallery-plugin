<?php

use UrsacoreLab\StaticVars\Classes\Statuses;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('ursacorelab_gallery_rel_blog_posts', function (Blueprint $table) {
            $table->integer('gallery_id');
            $table->integer('post_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('ursacorelab_gallery_rel_blog_posts');
    }
};
