<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('setting.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::firstOrCreate(['id' => 1]);
        $setting->header_script = $request->input('header_script');
        $setting->footer_script = $request->input('footer_script');
        $setting->update();
        // $data = $request->except(['_token', 'logo', 'favicon', 'breadcrumb_banner']);

        // // ✅ Handle File Uploads
        // foreach (['logo', 'favicon', 'breadcrumb_banner'] as $collection) {
        //     if ($request->hasFile($collection)) {
        //         // Remove old media in this collection
        //         $setting->clearMediaCollection($collection);
        //         // Add new one
        //         $setting->addMediaFromRequest($collection)->toMediaCollection($collection);
        //     }
        // }

        // $data['maintenance_mode'] = $request->has('maintenance_mode') ? 1 : 0;

        // $setting->update($data);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}