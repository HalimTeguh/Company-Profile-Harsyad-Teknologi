<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

            $user = new User();
            $user->name = $validated['name'];
            $user->email = $validated['email'];
            $user->role = 0;
            $user->password = bcrypt($validated['password']);
            $user->save();
    
            return redirect()->route('user.index')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            dd($e);
        }
    }



}
