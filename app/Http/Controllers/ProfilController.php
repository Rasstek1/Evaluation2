<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
class ProfilController extends Controller
{

    public function index() {
        $profils = Profil::all(); // Récupérer tous les profils
        return view('index', ['profils' => $profils]); // Passer les profils à la vue
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        // Validation
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'pays' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required|date',
            'photoPath' => 'nullable|image',
        ]);

        // Création du profil
        $profil = new Profil;
        $profil->nom = $request->nom;
        $profil->prenom = $request->prenom;
        $profil->pays = $request->pays;
        $profil->sexe = $request->sexe;
        $profil->date_naissance = $request->date_naissance;
        $profil->photoPath = $request->photoPath;

        // Gestion de l'upload de la photo
        if ($request->hasFile('photoPath')) {
            $file = $request->file('photoPath');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $profil->photoPath = 'uploads/' . $filename;
        }

        $profil->save();

        return redirect('profils')->with('success', 'Profil créé');
    }

    // Pour éditer un profil existant
    public function edit($id)
    {
        $profil = Profil::find($id);
        if (!$profil) {
            return redirect('/profils')->with('error', 'Profil non trouvé');
        }
        return view('edit', compact('profil'));
    }

// Pour mettre à jour un profil existant
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'pays' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required|date',
            'photoPath' => 'nullable|image',
            // ajoutez d'autres règles de validation ici
        ]);

        $profil = Profil::find($id);
        if (!$profil) {
            return redirect('/profils')->with('error', 'Profil non trouvé');
        }

        // Gestion de l'upload de la photo
        if ($request->hasFile('photoPath')) {
            $file = $request->file('photoPath');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $profil->photoPath = 'uploads/' . $filename;
        }

        $profil->update($validatedData);

        return redirect('/profils')->with('success', 'Profil mis à jour');
    }


// Pour supprimer un profil
    public function destroy($id)
    {
        $profil = Profil::find($id);
        if (!$profil) {
            return redirect('/profils')->with('error', 'Profil non trouvé');
        }
        $profil->delete();

        return redirect('/profils')->with('success', 'Profil supprimé');
    }


}
