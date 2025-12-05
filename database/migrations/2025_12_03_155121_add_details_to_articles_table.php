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
        Schema::table('articles', function (Blueprint $table) {
            // Vérifie si la colonne existe avant de l'ajouter (évite le crash si déjà fait)
            if (!Schema::hasColumn('articles', 'theme_id')) {
                $table->foreignId('theme_id')->nullable()->constrained()->onDelete('cascade');
            }
            
            if (!Schema::hasColumn('articles', 'chapo')) {
                $table->text('chapo')->nullable(); // Le "chapo" (introduction)
            }

            if (!Schema::hasColumn('articles', 'published_at')) {
                $table->timestamp('published_at')->nullable(); // Date de visibilité
            }
        });
    }

    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::table('articles', function (Blueprint $table) {
        // On nettoie proprement
        if (Schema::hasColumn('articles', 'theme_id')) {
            $table->dropForeign(['theme_id']);
            $table->dropColumn('theme_id');
        }
        $table->dropColumn(['chapo', 'published_at']);
    });
}

};
