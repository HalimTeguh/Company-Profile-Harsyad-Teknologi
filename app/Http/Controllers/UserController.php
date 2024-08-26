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
    public function index(Request $request)
    {
        // Mengambil data pencarian dan filter
        $search = $request->input('search');
        $view = $request->input('view', 'paginated'); // default 'paginated'
        $perPage = $request->input('perPage', 5); // default 5

        // Query dasar
        $query = User::query();

        // Filter berdasarkan pencarian
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        }

        // Menentukan hasil yang akan ditampilkan
        if ($view === 'all') {
            $data = $query->get(); // Mengambil semua data
        } else {
            $data = $query->paginate($perPage); // Mengambil data dengan paginasi
        }

        // Mengirim data ke tampilan
        return view('users.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'edit_name' => 'required|string|max:255',
            'edit_email' => 'required|email|max:255|unique:users,email,'.$id,
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->edit_name,
            'email' => $request->edit_email,
        ]);

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 0,
        ]);

        return redirect()->route('user.index')->withStatus(__('Profile successfully updated.'));
    }

}
