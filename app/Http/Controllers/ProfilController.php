<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Profil;

class ProfilController extends Controller
{
    /**
     * Affiche la liste de tous les profils.
     *
     * @return \Illuminate\View\View
     */

    public function index() {
        $profils = Profil::all();

        $user = Auth::user();
        $hasProfile = false;

        if ($user) {
            $hasProfile = Profil::where('user_id', $user->id)->exists();
        }

        return view('index', ['profils' => $profils, 'hasProfile' => $hasProfile]);
    }


    /**
     * Affiche le formulaire pour créer un nouveau profil.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('create');
    }

    /**
     * Stocke un nouveau profil dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function store(Request $request) {
        $request->validate([
            'pays' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required|date',
            'photoPath' => 'nullable|image',
        ]);

        $existingProfil = Profil::where('user_id', Auth::id())->first();
        if($existingProfil) {
            return redirect('profils')->with('error', 'Vous avez déjà un profil');
        }

        $profil = new Profil;
        $profil->user_id = Auth::id();
        $profil->nom = Auth::user()->name;
        $profil->prenom = Auth::user()->firstname;
        $profil->fill($request->all());

        if ($request->hasFile('photoPath')) {
            $file = $request->file('photoPath');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $profil->photoPath = 'uploads/' . $filename;
        }

        $profil->save();

        return redirect('profils')->with('success', 'Profil créé');
    }


    /**
     * Affiche le formulaire pour éditer un profil existant en fonction de l'ID fourni.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
   /* public function edit($id) {
        // Obtenez l'utilisateur actuellement connecté
        $user = Auth::user();

        // Vérifiez si l'utilisateur est connecté
        if (!$user) {
            return redirect('/profils')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        // Trouvez le profil en fonction de l'ID fourni
        $profil = Profil::find($id);

        // Si aucun profil n'est trouvé
        if (!$profil) {
            return redirect('/profils')->with('error', 'Profil non trouvé.');
        }

        // Vérifiez si l'utilisateur connecté est autorisé à modifier ce profil
        if ($profil->user_id != $user->id) {
            return redirect('/profils')->with('error', 'Accès non autorisé.');
        }

        return view('edit', compact('profil'));
    }*/

//methode pour modifier son propre profil en fonction de l'id de l'utilisateur connecté
    public function editSelf() {
        $user = Auth::user();
        $profil = Profil::where('user_id', $user->id)->first();
        if (!$profil) {
            return redirect('/profils')->with('error', 'Profil non trouvé');
        }
        return view('edit', compact('profil'));
    }

    /**
     * Met à jour un profil existant dans la base de données.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request) {
        $validatedData = $request->validate([

            'pays' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required|date',
            'photoPath' => 'nullable|image',
        ]);

        $user_id = Auth::id();
        $profil = Profil::where('user_id', $user_id)->first();

        if (!$profil) {
            return redirect('/profils')->with('error', 'Profil non trouvé');
        }

        if ($request->hasFile('photoPath')) {
            $file = $request->file('photoPath');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $validatedData['photoPath'] = 'uploads/' . $filename;
        }

        $profil->update($validatedData);

        return redirect('/profils')->with('success', 'Profil mis à jour');


    }

    /**
     * Supprime un profil existant de la base de données.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) {
        $profil = Profil::find($id);
        if (!$profil) {
            return redirect('/profils')->with('error', 'Profil non trouvé');
        }
        $profil->delete();

        return redirect('/profils')->with('success', 'Profil supprimé');
    }


}
