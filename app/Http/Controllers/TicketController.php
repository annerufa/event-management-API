<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        return Ticket::all();
    }

    public function store(Request $request)
    {
        $ticket = Ticket::create($request->all());
        return response()->json($ticket, 201);
    }

    public function show($id)
    {
        return Ticket::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
        return response()->json($ticket, 200);
    }

    public function destroy($id)
    {
        $deleted = Ticket::destroy($id);
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
