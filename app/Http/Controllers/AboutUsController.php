<?php
namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
{
    $abouts = AboutUs::all(); // Mengambil semua data
    return view('abouts.index', compact('abouts')); // Kirim data ke view
}
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar opsional
        ]);
        $imageName = null; // Default null jika tidak ada gambar
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/abouts'), $imageName);
        }
        AboutUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName, // Simpan nama file gambar atau null
        ]);
        return redirect()->route('abouts.index')->with('success', 'Data berhasil ditambahkan!');
    }
    public function update(Request $request, $id)
    {
        $aboutUs = AboutUs::find($id);
        if (!$aboutUs) {
            return redirect()->route('abouts.index')->with('error', 'Data tidak ditemukan!');
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar opsional
        ]);
        if ($request->hasFile('image')) {
            if ($aboutUs->image) {
                $oldImagePath = public_path('images/abouts/' . $aboutUs->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Menghapus gambar lama
                }
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/abouts'), $imageName);
            $aboutUs->image = $imageName; // Perbarui nama file gambar
        }
        $aboutUs->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        $aboutUs->save();
        return redirect()->route('abouts.index')->with('success', 'Data berhasil diperbarui!');
    }
public function destroy($id)
{
    $aboutUs = AboutUs::find($id);
    if (!$aboutUs) {
        return redirect()->route('abouts.index')->with('error', 'Data tidak ditemukan!');
    }
    $aboutUs->delete();
    return redirect()->route('abouts.index')->with('success', 'Data berhasil dihapus!');
}
    public function create()
{
    return view('abouts.create');
}
public function edit($id)
{
    $aboutUs = AboutUs::find($id);
    if (!$aboutUs) {
        return redirect()->route('abouts.index')->with('error', 'Data tidak ditemukan!');
    }
    return view('abouts.edit', compact('aboutUs'));
}

public function show(AboutUs $id)
{
    return view('abouts.show', compact('id')); // Mengirim variabel id ke view
}



}
