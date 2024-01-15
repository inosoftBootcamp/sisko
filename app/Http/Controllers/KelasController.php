<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json([
            'data' => $kelas
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
            $kelas = Kelas::create([
                'kelas' => $request->kelas
            ]);
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data kelas gagal disimpan',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data kelas berhasil disimpan',
            'data' => $kelas
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas, $id)
    {
        $kelas = Kelas::where('_id', $id)->get();

        return response()->json([
            'data' => $kelas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas, $id)
    {
        $kelas = Kelas::find($id);

        try {
            $kelas->kelas = $request->kelas;
            $kelas->save();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data kelas gagal diubah',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data kelas berhasil diubah',
            'data' => $kelas
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas, $id)
    {
        $kelas = Kelas::find($id);

        try {
            $kelas->delete();
        }catch (Exception $e) {
            return response()->json([
                'code' => '400',
                'message' => 'Data kelas gagal dihapus',
                'error' => $e->getMessage()
            ]);
        }

        return response()->json([
            'code' => '200',
            'message' => 'Data kelas berhasil dihapus',
            'data' => $kelas
        ]);
    }
}
