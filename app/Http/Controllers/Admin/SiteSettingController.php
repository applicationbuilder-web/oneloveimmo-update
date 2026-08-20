<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Afficher les paramètres du site.
     */
    public function edit()
    {
        $settings = SiteSetting::first();

        if (!$settings) {
            $settings = SiteSetting::create();
        }

        return view('admin.settings.edit', compact('settings'));
    }

    /**
     * Mettre à jour les paramètres du site.
     */
    public function update(Request $request)
    {
        $request->validate([
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $settings = SiteSetting::first();

        if (!$settings) {
            $settings = SiteSetting::create();
        }

        if ($request->hasFile('hero_image')) {

            if ($settings->hero_image) {
                Storage::disk('public')->delete($settings->hero_image);
            }

            $settings->hero_image = $request
                ->file('hero_image')
                ->store('site', 'public');
        }

        $settings->save();

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Les paramètres du site ont été mis à jour avec succès.');
    }
}