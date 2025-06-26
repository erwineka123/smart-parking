<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perizinan;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Dosen;

class PerizinanController extends Controller
{
    public function showForm(Request $request)
    {
        $dosenNama = Session::get('dosen_nama');

        if (!$dosenNama) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('pages.perizinan', compact('dosenNama'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_date' => 'required|date',
            'end_time' => 'required',
        ]);
        // $today = Carbon::today();
        // $diizinkan = $today->between($request->start_date, $request->end_date);
        $now = Carbon::now();
        $start = Carbon::parse($request->start_date . ' ' . $request->start_time);
        $end = Carbon::parse($request->end_date . ' ' . $request->end_time);
        $diizinkan = $now->between($start, $end);

        Perizinan::create([
            'nama' => $request->nama,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_date' => $request->end_date,
            'end_time' => $request->end_time,
            'diizinkan' => $diizinkan
        ]);

        return redirect()->route('perizinan.informasi');
    }

    public function showInformasi()
{
    $now = Carbon::now();
    $today = $now->toDateString();
    $time = $now->format('H:i');
    
    $dosen = session('dosen_nama');

    if ($dosen) {
        $izin = Perizinan::where('nama', $dosen)
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->where('start_time', '<=', $time)
            ->where('end_time', '>=', $time)
            ->latest()
            ->first();

        return view('pages.informasi', compact('izin', 'dosen', 'now'));
    } else {
        # order by id dosen
        $dosens = Dosen::orderBy('id', 'asc')->pluck('nama')->toArray();

        $izinList = [];
        foreach ($dosens as $nama) {
            $izin = Perizinan::where('nama', $nama)
                ->whereDate('start_date', '<=', $today)
                ->whereDate('end_date', '>=', $today)
                ->where('start_time', '<=', $time)
                ->where('end_time', '>=', $time)
                ->latest()
                ->first();

            $izinList[] = ['nama' => $nama, 'izin' => $izin];
        }

        return view('pages.informasi', compact('izinList', 'now'));
    }
}
}
