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
            'date_naissance' => '1998-01-01',
            'photoPath' => 'uploads/photo1.webp',
        ]);

        Profil::create([
            'nom' => 'Dominic',
            'prenom' => 'Jane',
            'pays' => 'États-Unis',
            'sexe' => 'Femme',
            'date_naissance' => '1997-05-15',
            'photoPath' => 'uploads/photo2.jpg',
        ]);

        Profil::create([
            'nom' => 'Stratford',
            'prenom' => 'Paul',
            'pays' => 'Canada',
            'sexe' => 'Homme',
            'date_naissance' => '1999-02-12',
            'photoPath' => 'uploads/photo3.webp',
        ]);

        Profil::create([
            'nom' => 'Leroy',
            'prenom' => 'Alice',
            'pays' => 'Belgique',
            'sexe' => 'Femme',
            'date_naissance' => '1996-06-23',
            'photoPath' => 'uploads/photo4.jpg',
        ]);

        Profil::create([
            'nom' => 'Sanchez',
            'prenom' => 'Carlos',
            'pays' => 'Espagne',
            'sexe' => 'Homme',
            'date_naissance' => '1999-11-09',
            'photoPath' => 'uploads/photo5.webp',
        ]);

        Profil::create([
            'nom' => 'Rossi',
            'prenom' => 'Isabella',
            'pays' => 'Italie',
            'sexe' => 'Femme',
            'date_naissance' => '1998-08-20',
            'photoPath' => 'uploads/photo6.jpg',
        ]);

        Profil::create([
            'nom' => 'Schmidt',
            'prenom' => 'Amanda',
            'pays' => 'Allemagne',
            'sexe' => 'Femme',
            'date_naissance' => '2002-10-13',
            'photoPath' => 'uploads/photo7.jpg',
        ]);

        Profil::create([
            'nom' => 'Johnson',
            'prenom' => 'Emily',
            'pays' => 'États-Unis',
            'sexe' => 'Femme',
            'date_naissance' => '1999-03-22',
            'photoPath' => 'uploads/photo8.jpg',
        ]);

        Profil::create([
            'nom' => 'Garcia',
            'prenom' => 'Sarah',
            'pays' => 'États-Unis',
            'sexe' => 'Femme',
            'date_naissance' => '1999-03-22',
            'photoPath' => 'uploads/photo9.jpg',
        ]);

        Profil::create([
            'nom' => 'Roy',
            'prenom' => 'Tracy',
            'pays' => 'Canada',
            'sexe' => 'Femme',
            'date_naissance' => '1999-03-22',
            'photoPath' => 'uploads/photo10.jpg',
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
