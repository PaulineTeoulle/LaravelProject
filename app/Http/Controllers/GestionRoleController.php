<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GestionRoleController extends Controller
{

    public function index()
    {
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
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('gestion')
            ->with('success', 'Modification enregistrée.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();

        return view('gestion', array(
            'users' => $users,
        ));
    }
}
