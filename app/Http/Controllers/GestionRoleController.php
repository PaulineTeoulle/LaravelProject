<?php

namespace App\Http\Controllers;


use App\Models\Recipe;
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        $users = User::all();
        return view('gestion', array(
            'users' => $users,
        ));
    }
}
