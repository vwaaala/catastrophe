<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all(); // Assuming there is only one settings record

        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate(['contact_email' => 'required|email']);
        Setting::updateOrCreate(['id' => 1], $request->all());
        return redirect()->route('settings.index')->with('success', 'Settings saved successfully.');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate(['contact_email' => 'required|email']);
        $setting->update($request->all());
        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }

    public function destroy(Setting $setting)
    {
        // Typically, settings shouldn't be deleted, but if needed:
        $setting->delete();
        return redirect()->route('settings.index')->with('success', 'Settings deleted successfully.');
    }
}
