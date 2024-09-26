<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        return view('admin.reports.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string', 'description' => 'required|string']);
        // TODO remove static
        $request->merge(['uploads' => '1']);
        Report::create($request->all());
        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }

    public function edit(Report $report)
    {
        return view('admin.reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate(['title' => 'required|string', 'description' => 'required|string']);
        // TODO remove static
        $request->merge(['uploads' => '1']);
        $report->update($request->all());
        return redirect()->route('reports.index')->with('success', 'Report updated successfully.');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report deleted successfully.');
    }
}
