<?php

namespace App\Http\Controllers;

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
        return view('index', ['profils' => $profils]);
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
            'nom' => 'required',
            'prenom' => 'required',
            'pays' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required|date',
            'photoPath' => 'nullable|image',
        ]);

        $profil = new Profil;
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
     * Affiche le formulaire pour éditer un profil existant.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $profil = Profil::find($id);
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
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'pays' => 'required',
            'sexe' => 'required',
            'date_naissance' => 'required|date',
            'photoPath' => 'nullable|image',
        ]);

        $profil = Profil::find($id);
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
