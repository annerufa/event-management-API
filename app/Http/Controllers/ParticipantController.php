<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class ParticipantController extends Controller
{
    public function index()
    {
        return Participant::all();
    }

    public function store(Request $request)
    {
        $participant = Participant::create($request->all());
        return response()->json($participant, 201);
    }

    public function show($id)
    {
        return Participant::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $participant = Participant::findOrFail($id);
        $participant->update($request->all());
        return response()->json($participant, 200);
    }

    public function destroy($id)
    {
        $deleted = Participant::destroy($id);
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
