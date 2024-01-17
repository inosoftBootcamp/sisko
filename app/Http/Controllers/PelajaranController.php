<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelajaran = Pelajaran::all();
        return response()->json([
            'data' => $pelajaran
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
            $pelajaran = Pelajaran::create([
                'mapel' => $request->mapel
            ]);
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data pelajaran gagal disimpan',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data pelajaran berhasil disimpan',
            'data' => $pelajaran
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelajaran $pelajaran)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelajaran $pelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelajaran $pelajaran, $id)
    {
        $pelajaran = Pelajaran::find($id);
        try {
            $pelajaran->mapel = $request->mapel;
            $pelajaran->save();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data pelajaran gagal disimpan',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data pelajaran berhasil disimpan',
            'data' => $pelajaran
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelajaran $pelajaran, $id)
    {
        $pelajaran = Pelajaran::find($id);

        try {
            $pelajaran->delete();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data pelajaran gagal dihapus',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data pelajaran berhasil dihapus',
            'data' => $pelajaran
        ]);
    }
}
