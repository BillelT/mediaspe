<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::dropIfExists('__temp__articles');

        Schema::table('articles', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
            $table->longText('content')->nullable(false)->change();
            $table->text('chapo')->nullable(false)->change();
            $table->timestamp('published_at')->nullable(false)->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->json("saved_articles")->nullable();
        });

        Schema::table('themes', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change();
            $table->string('slug')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
