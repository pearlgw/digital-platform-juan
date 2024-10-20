<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalKeseluruhanProducts = Product::count();
        $totalDataTransaksi = Transaksi::count();

        $loggedInUser = Auth::user();
        $totalProductsByLoggedInUser = Product::where('user_id', $loggedInUser->id)->count();

        return view('dashboard.mainpage.index', [
            'title' => 'Dashboard Platform Juan',
            'totalUsers' => $totalUsers,
            'totalKeseluruhanProducts' => $totalKeseluruhanProducts,
            'totalDataTransaksi' => $totalDataTransaksi,
            'totalProductsByLoggedInUser' => $totalProductsByLoggedInUser,
        ]);
    }
}