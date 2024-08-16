<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        if (!Session::has('id_pelanggan')) {
            return redirect()->route('login'); // Arahkan ke halaman login jika belum login
        }

        // Pengguna sudah login
        $user = DB::table('tb_pelanggan')
                  ->where('id_pelanggan', Session::get('id_pelanggan')) // Gunakan kolom yang benar
                  ->first();

        return view('profile.index', compact('user'));
    }
}
