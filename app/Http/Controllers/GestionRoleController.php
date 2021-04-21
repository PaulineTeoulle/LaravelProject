<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GestionRoleController extends Controller
{

    public function index()
    {
        //Récupération des données de tous les utilisateurs et affichage
        $users = User::all();
        return view('gestion', array(
            'users' => $users,
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //Recherche de l'utilisateur via l'id, update du role de l'utilisateur
        $user = User::find($id);
        $user->update($request->all());

        //Redirection sur la bonne route avec message de succès
        return redirect()->route('gestion')
            ->with('success', 'Modification enregistrée.');
    }

    public function search(Request $request)
    {

        $search = $request->input('search');

        //Récupération des données correspondant à la requete de recherche
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();

        //Passage des données à la view
        return view('gestion', array(
            'users' => $users,
        ));
    }
}
