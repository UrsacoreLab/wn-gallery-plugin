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
        Schema::create('ursacorelab_galleries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->json('images')->nullable();
            $table->integer('status')->default(Statuses::ACTIVE);

            $table->timestamps();
        });

        Schema::create('ursacorelab_gallery_rel_categories', function (Blueprint $table) {
            $table->integer('gallery_id');
            $table->integer('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('ursacorelab_galleries');
        Schema::dropIfExists('ursacorelab_gallery_rel_categories');
    }
};
