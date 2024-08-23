<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $user = User::get();
        return view('users.index', ['users' => $model->paginate(15)], ['data' => $user]);
    }

    public function edit(Request $request, $id)
    {
        $request;
        $user = User::findOrFail($id);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }

}
