<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
   protected $fillable = [

    // Images
    'hero_image',
    'construction_image',
    'about_image',
    'project_image_1',
    'project_image_2',
    'project_image_3',

    // Contact
    'contact_address',
    'contact_phone',
    'contact_email',

    // Réseaux sociaux
    'facebook_url',
    'instagram_url',
    'linkedin_url',
    'whatsapp_url',

    // Statistiques & Chiffres clés
    'stat_properties',
    'stat_projects',
    'stat_clients',
    'stat_experience',
];

    /**
     * Chiffre réel pour les biens
     */
    public function getEffectivePropertiesCount(): string
    {
        if (!empty($this->stat_properties)) {
            return (string) $this->stat_properties;
        }

        return (string) Property::count();
    }

    /**
     * Chiffre réel pour les projets de construction
     */
    public function getEffectiveProjectsCount(): string
    {
        if (!empty($this->stat_projects)) {
            return (string) $this->stat_projects;
        }

        return (string) Construction::count();
    }

    /**
     * Chiffre réel pour les clients / demandes
     */
    public function getEffectiveClientsCount(): string
    {
        if (!empty($this->stat_clients)) {
            return (string) $this->stat_clients;
        }

        $count = Quote::count() + Contact::count();
        return (string) ($count > 0 ? $count : 0);
    }

    /**
     * Chiffre réel pour les années d'expérience
     */
    public function getEffectiveExperienceCount(): string
    {
        if (!empty($this->stat_experience)) {
            return (string) $this->stat_experience;
        }

        return '5';
    }

    /**
     * Obtenir une URL WhatsApp fonctionnelle (soit depuis whatsapp_url, soit depuis contact_phone)
     */
    public function getEffectiveWhatsappUrl(?string $customMessage = null): ?string
    {
        $target = $this->whatsapp_url ?: $this->contact_phone;
        if (empty($target)) {
            return null;
        }

        $defaultMsg = $customMessage ?? "Bonjour OneLove Immo, je vous contacte depuis votre site internet.";

        // Si c'est déjà un lien web
        if (str_starts_with($target, 'http://') || str_starts_with($target, 'https://')) {
            if (str_contains($target, 'wa.me') && !str_contains($target, 'text=')) {
                $separator = str_contains($target, '?') ? '&' : '?';
                return $target . $separator . 'text=' . urlencode($defaultMsg);
            }
            return $target;
        }

        // Nettoyage du numéro
        $clean = preg_replace('/[^0-9]/', '', $target);
        if (empty($clean)) {
            return null;
        }

        // Gestion de l'indicatif Congo Brazzaville (242)
        if (str_starts_with($clean, '0') && strlen($clean) === 9) {
            $clean = '242' . substr($clean, 1);
        } elseif (!str_starts_with($clean, '242') && strlen($clean) <= 9) {
            $clean = '242' . $clean;
        }

        return 'https://wa.me/' . $clean . '?text=' . urlencode($defaultMsg);
    }
}