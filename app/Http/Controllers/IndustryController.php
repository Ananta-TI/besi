<?php
namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::all();
        return view('industries.index', compact('industries'));
    }

    public function create()
    {
        return view('industries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('industries', 'public');

            Industry::create([
                'name' => $request->name,
                'image' => $imagePath
            ]);

            return redirect()->route('industries.index')->with('success', 'Industry created successfully.');
        } else {
            return back()->withErrors(['image' => 'File upload failed.']);
        }
    }

    public function edit(Industry $industry)
    {
        return view('industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:3048',
        ]);

        $imagePath = $industry->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('industries', 'public');
        }

        $industry->update([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('industries.index')->with('success', 'Industry updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();
        return redirect()->route('industries.index')->with('success', 'Industry deleted successfully.');
    }
}
