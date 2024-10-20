<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Ambil parameter 'search' dari request
        $search = $request->input('search');

        // Jika ada input search, filter berdasarkan nama, email, atau lainnya
        $users = User::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('nama_usaha', 'like', "%{$search}%");
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Return ke view dengan data users dan judul halaman
        return view('dashboard.users.index', [
            'title' => 'Manage Users',
            'users' => $users
        ]);
    }

    public function show(User $user){
        return view('dashboard.users.show', [
            'title' => 'Show Profile',
            'user' => $user
        ]);
    }

    public function destroy(User $user){
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}