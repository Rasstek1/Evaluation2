<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Profil;

class ProfilSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_profil_seeder()
    {
        // Exécutez le seeder
        $this->seed(\ProfilSeeder::class);

        // Vérifiez que les profils ont été créés
        $jean = Profil::where('nom', 'Dupont')->first();
        $jane = Profil::where('nom', 'Doe')->first();

        // Pour Jean Dupont
        $this->assertNotNull($jean);
        $this->assertEquals('Jean', $jean->prenom);
        $this->assertEquals('France', $jean->pays);
        $this->assertEquals('Homme', $jean->sexe);
        $this->assertEquals('1980-01-01', $jean->date_naissance);
        $this->assertEquals('path/to/photo1.jpg', $jean->photoPath);

        // Pour Jane Doe
        $this->assertNotNull($jane);
        $this->assertEquals('Jane', $jane->prenom);
        $this->assertEquals('États-Unis', $jane->pays);
        $this->assertEquals('Femme', $jane->sexe);
        $this->assertEquals('1990-05-15', $jane->date_naissance);
        $this->assertEquals('path/to/photo2.jpg', $jane->photoPath);
    }
}
