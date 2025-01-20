<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;

class OrganizerController extends Controller
{
    public function index()
    {
        return Organizer::all();
    }

    public function store(Request $request)
    {
        $organizer = Organizer::create($request->all());
        return response()->json($organizer, 201);
    }

    public function show($id)
    {
        return Organizer::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $organizer = Organizer::findOrFail($id);
        $organizer->update($request->all());
        return response()->json($organizer, 200);
    }

    public function destroy($id)
    {
        $deleted = Organizer::destroy($id);
        if ($deleted) {
            return response()->json([
                'message' => 'Data berhasil dihapus',
            ], 200); // Status 200 untuk penghapusan yang berhasil
        }

        return response()->json([
            'message' => 'Data tidak ditemukan atau gagal dihapus',
        ], 404); // Status 404 jika data tidak ditemukan
    }
}
