<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Feedback::all();
    }

    public function store(Request $request)
    {
        $feedback = Feedback::create($request->all());
        return response()->json($feedback, 201);
    }

    public function show($id)
    {
        return Feedback::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->update($request->all());
        return response()->json($feedback, 200);
    }

    public function destroy($id)
    {
        $deleted = Feedback::destroy($id);
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
