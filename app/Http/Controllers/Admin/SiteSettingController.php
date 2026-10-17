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

            // Images
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'construction_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'project_image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'project_image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'project_image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            // Contact
            'contact_address' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:100',
            'contact_email' => 'nullable|email|max:255',

            // Réseaux sociaux
            'facebook_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|string|max:255',
            'whatsapp_url' => 'nullable|string|max:255',

            // Statistiques / Chiffres clés
            'stat_properties' => 'nullable|string|max:50',
            'stat_projects' => 'nullable|string|max:50',
            'stat_clients' => 'nullable|string|max:50',
            'stat_experience' => 'nullable|string|max:50',
        ]);

        $settings = SiteSetting::first();

        if (!$settings) {
            $settings = SiteSetting::create();
        }

        /*
        |--------------------------------------------------------------------------
        | Gestion des images
        |--------------------------------------------------------------------------
        */

        $images = [
            'hero_image',
            'construction_image',
            'about_image',
            'project_image_1',
            'project_image_2',
            'project_image_3',
        ];

        foreach ($images as $image) {

            if ($request->hasFile($image)) {

                // Supprimer l'ancienne image
                if ($settings->$image) {
                    Storage::disk('public')->delete($settings->$image);
                }

                // Enregistrer la nouvelle image
                $settings->$image = $request
                    ->file($image)
                    ->store('site', 'public');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Informations de contact
        |--------------------------------------------------------------------------
        */

        $settings->contact_address = $request->contact_address;
        $settings->contact_phone = $request->contact_phone;
        $settings->contact_email = $request->contact_email;

        /*
        |--------------------------------------------------------------------------
        | Réseaux sociaux
        |--------------------------------------------------------------------------
        */

        $settings->facebook_url = $request->facebook_url;
        $settings->instagram_url = $request->instagram_url;
        $settings->linkedin_url = $request->linkedin_url;
        $settings->whatsapp_url = $request->whatsapp_url;

        /*
        |--------------------------------------------------------------------------
        | Statistiques / Chiffres clés ("Pourquoi nous faire confiance")
        |--------------------------------------------------------------------------
        */

        $settings->stat_properties = $request->stat_properties;
        $settings->stat_projects = $request->stat_projects;
        $settings->stat_clients = $request->stat_clients;
        $settings->stat_experience = $request->stat_experience;

        $settings->save();

        return redirect()
            ->route('admin.settings.edit')
            ->with(
                'success',
                'Les paramètres du site ont été mis à jour avec succès.'
            );
    }
}