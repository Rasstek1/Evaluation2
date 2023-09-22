<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // Insérer des données spécifiques
        Profil::create([
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'pays' => 'France',
            'sexe' => 'Homme',
            'date_naissance' => '1980-01-01',
            'photoPath' => 'path/to/photo1.jpg',
        ]);

        Profil::create([
            'nom' => 'Doe',
            'prenom' => 'Jane',
            'pays' => 'États-Unis',
            'sexe' => 'Femme',
            'date_naissance' => '1990-05-15',
            'photoPath' => 'path/to/photo2.jpg',
        ]);

//OU Pour inserer les donner plus direct sans eloquent

   /*     DB::table('profils')->insert([
            'nom' => 'Doe',
            'prenom' => 'John',
            'pays' => 'Canada',
            'sexe' => 'M',
            'date_naissance' => '1980-01-01',
            // ajoutez un chemin d'image si nécessaire
            // 'photoPath' => 'uploads/some_path.jpg',
        ]);

        DB::table('profils')->insert([
            'nom' => 'Smith',
            'prenom' => 'Jane',
            'pays' => 'USA',
            'sexe' => 'F',
            'date_naissance' => '1990-01-01',
            // ajoutez un chemin d'image si nécessaire
            // 'photoPath' => 'uploads/some_path.jpg',
        ]);*/


        /* public function run(): void
         {
             // Cela va creer 50 enregistrements de profils en utilisant la factory
             Profil::factory(50)->create();
         }*/
    }
}

//Commande : php artisan db:seed --class=ProfilSeeder
