<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        // Dans la méthode 'up', nous définissons les changements que nous souhaitons apporter à la base de données.

        Schema::table('users', function (Blueprint $table) {
            // Ajoute une colonne 'role' à la table 'users' avec une valeur par défaut de 'visiteur'.
            $table->string('role')->default('visiteur');
        });
    }

    /**
     * Revertit les migrations.
     */
    public function down(): void
    {
        // Dans la méthode 'down', nous définissons comment annuler les changements apportés dans la méthode 'up'.

        Schema::table('users', function (Blueprint $table) {
            // Supprime la colonne 'role' de la table 'users'.
            $table->dropColumn('role');
        });
    }
};
