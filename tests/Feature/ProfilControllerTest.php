<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Profil;

class ProfilControllerTest extends TestCase
{
    use RefreshDatabase;// Cette trait remet à zéro la base de données après chaque test
    use WithFaker;
    /**
     * Teste la méthode index du ProfileController.
     *
     * @return void
     */
    public function test_index_method()
    {
        // Créez quelques profils dans la base de données
        $profil1 = Profil::factory()->create();
        $profil2 = Profil::factory()->create();
        $profil3 = Profil::factory()->create();

        // Appellez la méthode index
        $response = $this->get('/profils');

        // Assurez-vous que la réponse est correcte (200 OK)
        $response->assertStatus(200);

        // Assurez-vous que la vue retournée est celle que vous attendez
        $response->assertViewIs('index');

        // Assurez-vous que les profils sont bien passés à la vue
        $response->assertViewHas('profils');

        // Assurez-vous que les profils sont bien dans la réponse
        $response->assertSee([$profil1->name, $profil2->name, $profil3->name]); // Remplacez 'name' par la propriété que vous souhaitez vérifier
    }

    public function test_create_method()
    {
        // Appel à la méthode du contrôleur
        $response = $this->get('/profils/create');  // Remplacez par la route correcte si elle est différente

        // Vérifications
        $response->assertStatus(200);
        $response->assertViewIs('create');
    }

    public function test_store_method()
    {
        // Données de test
        $data = [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'pays' => $this->faker->country,
            'sexe' => 'Homme',
            'date_naissance' => '1990-05-15',
        ];

        // Appel à la méthode du contrôleur
        $response = $this->post('/profils', $data);  // Remplacez par la route correcte si elle est différente

        // Vérifications
        $response->assertRedirect('profils');
        $response->assertSessionHas('success', 'Profil créé');

        // Vérifier que les données sont bien dans la base de données
        $this->assertDatabaseHas('profils', [
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'pays' => $data['pays'],
            'sexe' => $data['sexe'],
            'date_naissance' => $data['date_naissance'],
        ]);
    }

    public function test_edit_method()
    {
        // 1. Créer un profil dans la base de données
        $profil = Profil::create([
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'pays' => 'France',
            'sexe' => 'Homme',
            'date_naissance' => '1980-01-01',
            'photoPath' => 'path/to/photo1.jpg',
        ]);

        // 2. Appeler la méthode edit via une requête HTTP
        $response = $this->get("/profils/{$profil->id}/edit");

        // 3. Vérifier que la réponse HTTP a un statut de 200
        $response->assertStatus(200);

        // 4. Vérifier que la vue retournée contient les bonnes données
        $response->assertViewHas('profil', function ($viewProfil) use ($profil) {
            return $viewProfil->id === $profil->id;
        });
    }

    public function test_update_method()
    {
        // 1. Créer un profil dans la base de données
        $profil = Profil::create([
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'pays' => 'France',
            'sexe' => 'Homme',
            'date_naissance' => '1980-01-01',
            'photoPath' => 'path/to/photo1.jpg',
        ]);

        // Données de mise à jour
        $updateData = [
            'nom' => 'Doe',
            'prenom' => 'Jane',
            'pays' => 'USA',
            'sexe' => 'Femme',
            'date_naissance' => '1990-05-15',
        ];

        // 2. Effectuer une requête HTTP PUT
        $response = $this->put("/profils/{$profil->id}", $updateData);

        // 3. Vérifier que la base de données contient bien les nouvelles informations
        $this->assertDatabaseHas('profils', $updateData);

        // 4. Vérifier que l'utilisateur est redirigé
        $response->assertRedirect('/profils');
        $response->assertSessionHas('success', 'Profil mis à jour');
    }

    public function test_destroy_method()
    {
        // 1. Créer un profil dans la base de données
        $profil = Profil::create([
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'pays' => 'France',
            'sexe' => 'Homme',
            'date_naissance' => '1980-01-01',
            'photoPath' => 'path/to/photo1.jpg',
        ]);

        // 2. Effectuer une requête HTTP DELETE
        $response = $this->delete("/profils/{$profil->id}");

        // 3. Vérifier que la base de données ne contient plus ce profil
        $this->assertDatabaseMissing('profils', ['id' => $profil->id]);

        // 4. Vérifier que l'utilisateur est redirigé
        $response->assertRedirect('/profils');
        $response->assertSessionHas('success', 'Profil supprimé');
    }

}
