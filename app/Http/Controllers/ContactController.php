<?php

namespace App\Http\Controllers;

use App\Models\Contact;  // Model untuk menyimpan kontak
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Menampilkan form untuk mengirim pesan (untuk Guest)
    public function create()
    {
        return view('contacts.create');
    }

    // Menyimpan pesan kontak yang dikirim (untuk Guest)
    public function store(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Simpan data kontak ke database
        Contact::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('contacts.create')->with('success', 'Your message has been sent successfully.');
    }

    // Menampilkan daftar pesan kontak (untuk Admin)
    public function index()
    {
        $contacts = Contact::all();  // Ambil semua pesan kontak

        return view('contacts.index', compact('contacts'));
    }

    // Menampilkan detail pesan kontak (untuk Admin)
    public function show($id)
    {
        $contact = Contact::findOrFail($id);  // Ambil data kontak berdasarkan ID

        return view('contacts.show', compact('contact'));
    }

    // Menampilkan form untuk mengedit pesan kontak (untuk Admin)
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);  // Ambil data kontak berdasarkan ID

        return view('contacts.edit', compact('contact'));
    }

    // Memperbarui pesan kontak (untuk Admin)
    public function update(Request $request, $id)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);  // Cari kontak berdasarkan ID
        $contact->update($validatedData);  // Update data kontak

        return redirect()->route('contacts.index')->with('success', 'Message updated successfully.');
    }

    // Menghapus pesan kontak (untuk Admin)
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);  // Cari kontak berdasarkan ID
        $contact->delete();  // Hapus kontak

        return redirect()->route('contacts.index')->with('success', 'Message deleted successfully.');
    }
}
