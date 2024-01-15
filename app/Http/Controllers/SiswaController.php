<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return response()->json([
            'data' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $siswa = Siswa::create([
                'nama' => $request->nama,
                'kelas_id' => $request->kelas_id
            ]);
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data siswa gagal disimpan',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data siswa berhasil disimpan',
            'data' => $siswa
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa, $id)
    {
        $siswa = Siswa::where('_id', $id)->get();
        return response()->json([
            'data' => $siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa, $id)
    {
        $siswa = Siswa::find($id);

        try {
            $siswa->nama = $request->nama;
            $siswa->kelas_id = $request->kelas_id;
            $siswa->save();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data siswa gagal diubah',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data siswa berhasil diubah',
            'data' => $siswa
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa, $id)
    {
        $siswa = Siswa::find($id);

        try {
            $siswa->delete();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data siswa gagal dihapus',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data siswa berhasil dihapus',
            'data' => $siswa
        ]);
    }
}
