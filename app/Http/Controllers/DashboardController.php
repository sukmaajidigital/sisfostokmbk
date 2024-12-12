<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // MEMANGGIL DATA USER YANG LOGIN
        // $user = User::where('id', Auth::user()->id)->first(); // Mengambil data karyawan yang terkait dengan user
        return view('page.dashboard');
    }
}
