<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use Carbon\Carbon;

class PerizinanApiController extends Controller
{
    public function index()
    {
        $data = Perizinan::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_date' => 'required|date',
            'end_time' => 'required',
        ]);

        $today = Carbon::today();
        $diizinkan = $today->between($request->start_date, $request->end_date);

        $izin = Perizinan::create([
            'nama' => $request->nama,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_date' => $request->end_date,
            'end_time' => $request->end_time,
            'diizinkan' => $diizinkan
        ]);

        return response()->json(['message' => 'Data berhasil disimpan', 'data' => $izin], 201);
    }

    public function show($id)
    {
        $izin = Perizinan::find($id);

        if (!$izin) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($izin);
    }

    public function update(Request $request, $id)
    {
        $izin = Perizinan::find($id);

        if (!$izin) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'nama' => 'required|string',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_date' => 'required|date',
            'end_time' => 'required',
        ]);

        $today = Carbon::today();
        $diizinkan = $today->between($request->start_date, $request->end_date);

        $izin->update([
            'nama' => $request->nama,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_date' => $request->end_date,
            'end_time' => $request->end_time,
            'diizinkan' => $diizinkan
        ]);

        return response()->json(['message' => 'Data berhasil diperbarui', 'data' => $izin]);
    }

    public function destroy($id)
    {
        $izin = Perizinan::find($id);

        if (!$izin) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $izin->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    public function statusParkir()
{
    $now = Carbon::now();
    $today = $now->toDateString();
    $time = $now->format('H:i');

    $dosens = \App\Models\Dosen::pluck('nama');
    $result = [];

    $index = 1;
    foreach ($dosens as $nama) {
        $izin = \App\Models\Perizinan::where('nama', $nama)
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->where('start_time', '<=', $time)
            ->where('end_time', '>=', $time)
            ->where('diizinkan', true)
            ->latest()
            ->first();

        $result["P" . $index] = [
            'nama' => $nama,
            'diizinkan' => $izin ? true : false,
            'jam' => $izin ? $izin->start_time . ' - ' . $izin->end_time : null
        ];
        $index++;
    }

    return response()->json($result);
}


}
