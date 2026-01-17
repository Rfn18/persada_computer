<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
{
    public function index()
    {
        $data = Kasir::all();

        if (! $data) {
            return new ApiResource(false, 'Data Kasir Kosong', null);
        }

        return new ApiResource(true, 'List Data Kasir', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kd_kasir' => 'nullable|string',
            'nama_kasir' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $lastKasir = Kasir::orderBy('id', 'desc')->first();

        if ($lastKasir && $lastKasir->kd_kasir) {
            $lastNumber = (int) substr($lastKasir->kd_kasir, 4);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $kodeKasir = 'KSR-'.str_pad($nextNumber, 6, '0', STR_PAD_LEFT);
        $kasir = Kasir::create([
            'kd_kasir' => $kodeKasir,
            'nama_kasir' => $request->nama_kasir,
        ]);

        return new ApiResource(true, 'Berhasil Menambahkan Kasir!', $kasir);
    }

    public function show($id)
    {
        $kasir = Kasir::find($id);

        if (! $kasir) {
            return new ApiResource(false, 'Kasir tidak ditemukan', null);
        }

        return new ApiResource(true, 'Kasir bedasarkan id', $kasir);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kd_kasir' => 'nullable|string',
            'nama_kasir' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kasir = Kasir::find($id);

        if (! $kasir) {
            return new ApiResource(false, 'Kasir tidak ditemukan', null);
        }

        $kasir->update([
            'kd_kasir' => $kasir->kd_kasir,
            'nama_kasir' => $request->nama_kasir ?? $kasir->nama_kasir,
        ]);

        return new ApiResource(true, 'Berhasil Update Data!', $kasir);
    }

    public function destroy($id)
    {
        if (!Kasir::find($id)) {
            return new ApiResource(false, 'Kasir tidak ditemukan', null);
        }

        Kasir::destroy($id);


        return new ApiResource(true, 'Berhasil hapus kasir', null);
    }
}
