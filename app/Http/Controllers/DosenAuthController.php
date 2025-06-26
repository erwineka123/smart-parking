<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Dosen;

class DosenAuthController extends Controller
{
    public function showLoginForm()
    {
        #order by id dosen
        $dosens = Dosen::orderBy('id', 'asc')->get();
        return view('dosen.login', compact('dosens'));
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        $dosen = Dosen::where('nama', $request->nama)->first();

        if ($dosen && Hash::check($request->password, $dosen->password)) {
            Auth::login($dosen);
            
            session(['dosen_nama' => $dosen->nama]);

            return redirect('/perizinan');
        }

        return back()->withErrors(['nama' => 'Nama atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('dosen_nama');
        return redirect('/dosen/login');
    }
}
