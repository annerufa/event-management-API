<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::all();
    }

    public function store(Request $request)
    {
        $event = Event::create($request->all());
        return response()->json($event, 201);
    }

    public function show($id)
    {
        return Event::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return response()->json($event, 200);
    }

    public function destroy($id)
    {
        $deleted = Event::destroy($id);
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
