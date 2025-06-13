<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;  // pastikan kamu punya model History
use App\Models\Food;     // model Food untuk data makanan

class HistoryController extends Controller
{
    // Menampilkan halaman history (GET /histories)
    public function index()
    {
        // Contoh ambil semua history milik user yang login, bisa kamu sesuaikan
        $user = auth()->user();

        $histories = History::where('user_id', $user->id)
                            ->with('food') // asumsi relasi food di History
                            ->get();

        return view('histories.index', compact('histories'));
    }

    // Simpan history baru (POST /histories)
    public function store(Request $request)
    {
        $request->validate([
            'history_type' => 'required|in:sarapan,makan_siang,makan_malam',
            'selected_foods' => 'required|array',
            'selected_foods.*' => 'exists:foods,id',
        ]);

        $user = auth()->user();
        $historyType = $request->input('history_type');
        $selectedFoods = $request->input('selected_foods');

        foreach ($selectedFoods as $foodId) {
            History::create([
                'user_id' => $user->id,
                'food_id' => $foodId,
                'history_type' => $historyType,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('histories.index')->with('success', 'Data berhasil disimpan ke riwayat!');
    }

    public function destroy($id)
{
    $history = History::findOrFail($id);
    $history->delete();

    return redirect()->back()->with('success', 'Riwayat berhasil dihapus.');
}
}
