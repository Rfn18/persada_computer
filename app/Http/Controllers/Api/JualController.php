<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiResource;
use App\Models\Barang;
use App\Models\DetailJual;
use App\Models\Jual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JualController extends Controller
{
    public function index()
    {
        $data = Jual::with('kasir')->get();

        if (! $data) {
            return new ApiResource(false, 'Data Jual tidak ditemukan', null);
        }

        return new ApiResource(true, 'List Data Jual', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kasir_id' => 'required|exists:kasirs,id',
            'bayar' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'items' => 'required|array',
            'items.*.kd_barang' => 'required|exists:barangs,kd_barang',
            'items.*.harga' => 'required|numeric',
            'items.*.jumlah' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $lastNota = Jual::orderBy('id', 'desc')->first();

        if ($lastNota && $lastNota->no_bon) {
            $lastNumber = (int) substr($lastNota->no_bon, 5);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $no_bon = 'NOTA-'.str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

        $jual = Jual::create([
            'no_bon' => $no_bon,
            'kasir_id' => $request->kasir_id,
            'discount' => $request->discount ?? 0,
            'total' => 0,
            'bayar' => $request->bayar,
            'kembali' => 0,
        ]);

        $total = 0;

        foreach ($request->items as $item) {
            $barang = Barang::where('kd_barang', $item['kd_barang'])->firstOrFail();
            $subtotal = $item['harga'] * $item['jumlah'];

            DetailJual::create([
                'jual_id' => $jual->id,
                'barang_id' => $barang->id,
                'kd_barang' => $item['kd_barang'],
                'harga' => $item['harga'],
                'jumlah' => $item['jumlah'],
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $totalAkhir = $total - ($request->discount ?? 0);

        $jual->update([
            'total' => $totalAkhir,
            'kembali' => $request->bayar - $totalAkhir,
        ]);

        return new ApiResource(true, 'Berhasil Menambahkan Jual!', [
            'id' => $jual->id,
            'no_bon' => $jual->no_bon,
            'tanggal' => $jual->created_at->format('Y-m-d'),
            'waktu' => $jual->created_at->format('H:i:s'),
            'total' => $jual->total,
            'bayar' => $jual->bayar,
            'kembali' => $jual->kembali,
        ]);
    }

    public function show($id)
    {
        $jual = Jual::with('kasir')->find($id);

        if (! $jual) {
            return new ApiResource(false, 'Data Jual tidak ditemukan', null);
        }

        return new ApiResource(true, 'Jual bedasarkan id', $jual);
    }
}
