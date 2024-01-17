<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Nilai;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            $nilai = Nilai::create([
                'siswa_id' => $request->siswa_id,
                'pelajaran_id' => $request->pelajaran_id,
                'lat1' => $request->lat1,
                'lat2' => $request->lat2,
                'lat3' => $request->lat3,
                'lat4' => $request->lat4,
                'uh1' => $request->uh1,
                'uh2' => $request->uh2,
                'uts' => $request->uts,
                'us' => $request->us,
            ]);
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data nilai gagal disimpan',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data nilai berhasil disimpan',
            'data' => $nilai
        ]);


        return response()->json(['data' => $nilai]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai, $id)
    {
        $nilai = Nilai::where('pelajaran_id', $id)->get();
        return response()->json([
            'data' => $nilai
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai, $id)
    {
        $nilai = Nilai::find($id);

        try {
            $nilai->siswa_id = $request->siswa_id;
            $nilai->pelajaran_id = $request->pelajaran_id;
            $nilai->lat1 = $request->lat1;
            $nilai->lat2 = $request->lat2;
            $nilai->lat3 = $request->lat3;
            $nilai->lat4 = $request->lat4;
            $nilai->uh1 = $request->uh1;
            $nilai->uh2 = $request->uh2;
            $nilai->uts = $request->uts;
            $nilai->us = $request->us;
            $nilai->save();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data nilai gagal diubah',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data nilai berhasil diubah',
            'data' => $nilai
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai, $id)
    {
        $nilai = Nilai::find($id);

        try {
            $nilai->delete();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data nilai gagal dihapus',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data nilai berhasil dihapus',
            'data' => $nilai
        ]);

    }
}
