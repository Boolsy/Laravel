<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('course')->insert([
            ['name' => 'Base des réseaux', 'code' => '1351'],
            ['name' => 'Environnement et technologies du web', 'code' => '1352'],
            ['name' => 'SGBD (Système de gestion de bases de données)', 'code' => '1353'],
            ['name' => 'Création de sites web statiques', 'code' => '1354'],
            ['name' => 'Approche Design', 'code' => '1355'],
            ['name' => 'CMS - niveau 1', 'code' => '1356'],
            ['name' => 'Initiation à la programmation', 'code' => '1357'],
            ['name' => 'Activités professionnelles de formation', 'code' => '1358'],
            ['name' => 'Scripts clients', 'code' => '1359'],
            ['name' => 'Scripts serveurs', 'code' => '1360'],
            ['name' => 'Framework et POO côté Serveur', 'code' => '1361'],
            ['name' => 'Projet Web dynamique', 'code' => '1362'],
            ['name' => 'Veille technologique', 'code' => '1363'],
            ['name' => 'Epreuve intégrée', 'code' => '1364'],
            ['name' => 'Anglais UE1', 'code' => '1783'],
            ['name' => 'Anglais UE2', 'code' => '1784'],
            ['name' => 'Initiation aux bases de données', 'code' => '1440'],
            ['name' => 'Principes algorithmiques et programmation', 'code' => '1442'],
            ['name' => 'Programmation orientée objet', 'code' => '1443'],
            ['name' => 'Web : principes de base', 'code' => '1444'],
            ['name' => 'Techniques de gestion de projet', 'code' => '1448'],
            ['name' => 'Principes d’analyse informatique', 'code' => '1449'],
            ['name' => 'Eléments de statistique', 'code' => '1755'],
            ['name' => 'Structure des ordinateurs', 'code' => '1808'],
            ['name' => 'Gestion et exploitation de bases de données', 'code' => '1811'],
            ['name' => 'Mathématiques appliquées à l’informatique', 'code' => '1807'],
            ['name' => 'Bases des réseaux', 'code' => '1323'],
            ['name' => 'Projet d’analyse et de conception', 'code' => '1450'],
            ['name' => 'Information et communication professionnelle', 'code' => '1754'],
            ['name' => 'Produits logiciels de gestion intégrés', 'code' => '1438'],
            ['name' => 'Administration, gestion et sécurisation des réseaux', 'code' => '1439'],
            ['name' => 'Projet de développement SGBD', 'code' => '1446'],
            ['name' => 'Stage d’intégration professionnelle', 'code' => '1451'],
            ['name' => 'Projet d’intégration de développement', 'code' => '1447'],
            ['name' => 'Activités professionnelles de formation', 'code' => '1452'],
            ['name' => 'Epreuve intégrée de la section', 'code' => '1453']
        ]);
    }


        /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
