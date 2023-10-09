<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Course extends Model
    {
        //Le trait HasFactory est utilisé pour créer des données de test (factories) associées à ce modèle.
        use HasFactory;



        protected $table = 'course'; // Spécifie la table de base de données associée à ce modèle.
    }
