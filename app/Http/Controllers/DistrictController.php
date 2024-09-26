<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('admin.districts.index', compact('districts'));
    }

    public function create()
    {
        return view('admin.districts.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);
        District::create($request->all());
        return redirect()->route('districts.index')->with('success', 'District created successfully.');
    }

    public function edit(District $district)
    {
        return view('admin.districts.edit', compact('district'));
    }

    public function update(Request $request, District $district)
    {
        $request->validate(['name' => 'required|string']);
        $district->update($request->all());
        return redirect()->route('districts.index')->with('success', 'District updated successfully.');
    }

    public function destroy(District $district)
    {
        $district->delete();
        return redirect()->route('districts.index')->with('success', 'District deleted successfully.');
    }
}
