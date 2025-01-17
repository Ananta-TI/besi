<?php
namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = AboutUs::all(); // Ambil semua data AboutUs dari database
        return view('abouts.index', compact('abouts'));
    }

    public function store(Request $request)
{
    // Validasi data input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // Simpan data ke database
    AboutUs::create([
        'title' => $request->title,
        'description' => $request->description,
        'content' => $request->content ?? '', // Isi default jika tidak ada
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('abouts.index')->with('success', 'Data berhasil ditambahkan!');
}


    public function show($id)
    {
        $aboutUs = AboutUs::find($id);
        if (!$aboutUs) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($aboutUs);
    }

    public function update(Request $request, $id)
{
    // Cari data berdasarkan ID
    $aboutUs = AboutUs::find($id);

    // Jika data tidak ditemukan, redirect dengan error
    if (!$aboutUs) {
        return redirect()->route('abouts.index')->with('error', 'Data tidak ditemukan!');
    }

    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // Update data
    $aboutUs->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('abouts.index')->with('success', 'Data berhasil diupdate!');
}


    public function destroy($id)
    {
        $aboutUs = AboutUs::find($id);
        if (!$aboutUs) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $aboutUs->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }

    public function create()
{
    // Return view untuk menampilkan form create
    return view('abouts.create');
}
public function edit($id)
{
    // Cari data berdasarkan ID
    $aboutUs = AboutUs::find($id);

    // Jika data tidak ditemukan, redirect dengan error
    if (!$aboutUs) {
        return redirect()->route('abouts.index')->with('error', 'Data tidak ditemukan!');
    }

    // Return view dengan data
    return view('abouts.edit', compact('aboutUs'));
}

}
