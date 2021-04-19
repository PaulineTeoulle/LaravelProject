<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GestionRoleController extends Controller
{

    public function index()
    {
        $users = User::all();
        return response()->json($users);
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
        $role = $request->params["role"];
        $user = User::find($id);
        $user->role = $role;
        $user->save();
    }

    public function search(Request $request)
    {
        $search = request('search');

        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();

        return response()->json($users);
    }
}
