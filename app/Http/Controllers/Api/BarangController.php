<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all();

        return new ApiResource(true, 'List Data Barang', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|string',
            'harga' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $lastBarang = Barang::orderBy('id', 'desc')->first();

        if ($lastBarang && $lastBarang->kd_barang) {
            $lastNumber = (int) substr($lastBarang->kd_barang, 4);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $kodeBarang = 'BRG-'.str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

        $barang = Barang::create([
            'kd_barang' => $kodeBarang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
        ]);

        return new ApiResource(true, 'Berhasil Menambahkan Barang!', $barang);
    }

    public function show($id)
    {
        $barang = Barang::find($id);

        return new ApiResource(true, 'Barang bedasarkan id', $barang);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kd_barang' => 'nullable|string',
            'nama_barang' => 'nullable|string',
            'harga' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $barang = Barang::find($id);

        $barang->update([
            'kd_barang' => $barang->kd_barang,
            'nama_barang' => $request->nama_barang ?? $barang->nama_barang,
            'harga' => $request->harga ?? $barang->harga,
        ]);

        return new ApiResource(true, 'Berhasil Update Data!', $barang);
    }

    public function destroy($id)
    {
        Barang::destroy($id);

        return new ApiResource(true, 'Berhasil hapus barang', null);
    }
}
