# 🏛️ Documentation Technique — Espace Administration OneLove Immo

> Guide de référence pour le design system, la responsivité multi-écrans, l'architecture des composants et la sécurité de l'espace administration de **OneLove Immo**.

---

## 📋 Table des Matières
1. [Vue d'Ensemble](#-vue-densemble)
2. [Système Responsive Multi-Écrans](#-système-responsive-multi-écrans)
3. [Design System & Charte Graphique](#-design-system--charte-graphique)
4. [Dark Mode & Tokens CSS](#-dark-mode--tokens-css)
5. [Composants de l'Interface](#-composants-de-linterface)
6. [Détail des Modules & Vues Administrateur](#-détail-des-modules--vues-administrateur)
7. [Sécurité & Authentification](#-sécurité--authentification)
8. [Signature Concepteur & Contact](#-signature-concepteur--contact)
9. [Commandes & Maintenance](#-commandes--maintenance)

---

## 🌟 Vue d'Ensemble
L'espace administration de **OneLove Immo** a été entièrement refondu pour offrir :
* Une **cohérence visuelle absolue** avec le site vitrine public (mêmes polices, dégradés de marque, micro-interactions et esthétique haut de gamme).
* Une **expérience responsive fluide** s'adaptant automatiquement de l'écran d'un smartphone ultra-compact (320px) jusqu'aux écrans 4K et Ultra-Wide (≥ 1400px).
* Un **mode sombre complet et sans reflets** avec détection de préférence système et persistance par `localStorage`.
* Une **ergonomie tactile optimisée** avec boutons larges, tiroir latéral offcanvas, et actions contextuelles en un clic (WhatsApp, Appel, Email).

---

## 📱 Système Responsive Multi-Écrans

Le layout repose sur une structure adaptative pilotée par CSS Grid, Flexbox et des Media Queries modernes :

```
┌─────────────────────────────────────────────────────────────┐
│                       TopBar (Sticky)                       │
│  [🍔 Menu]  Titre de la Page         [☀️/🌙] [Site] [🔔] [Avatar] │
├───────────────┬─────────────────────────────────────────────┤
│               │                                             │
│    Sidebar    │              Zone de Contenu                │
│    (270px     │                 (.adm-page)                 │
│   ou Tiroir   │                                             │
│   Offcanvas)  │    • Grille KPI Responsive (2x2 sur Mobile) │
│               │    • Tableaux avec défilement fluide        │
│               │    • Formulaires empilés ergonomiques       │
│               │                                             │
└───────────────┴─────────────────────────────────────────────┘
```

### Comportement par Tranche d'Écran

| Écran | Résolution | Comportement & Optimisations |
| :--- | :--- | :--- |
| **Mobile Compact** | `< 576px` | • **Tiroir latéral offcanvas** : masqué par défaut, s'ouvre avec transition cubique fluide et voile flouté (`.adm-backdrop`).<br>• **Topbar compacte (60px)** : sous-titres et nom textuel masqués, seuls les icônes d'action rapide (36px) restent visibles.<br>• **KPIs en grille 2×2** : lisibilité maximale sans défilement vertical interminable.<br>• **Boutons empilés** : les boutons d'actions et de formulaires passent en pleine largeur (`w-100`).<br>• **Tableaux avec scroll tactile** : défilement horizontal fluide avec barre discrète. |
| **Tablette & Pliable** | `576px – 991px` | • Le menu latéral reste en **tiroir coulissant** (`d-lg-none` pour le hamburger) pour offrir **100% de la largeur** aux tableaux de données et aux formulaires.<br>• En-têtes de cartes organisés en flexbox enveloppant (`flex-wrap`). |
| **Desktop & Laptop** | `992px – 1399px` | • Sidebar fixe latérale de **270px**.<br>• Topbar sticky avec profil complet, badge de notification dynamique et bascule de thème.<br>• Contenu aéré avec marge interne de 30px. |
| **Grands Écrans & 4K** | `≥ 1400px` | • Espacement étendu (`padding: 34px 40px`).<br>• Densité d'affichage optimale sans étirement disproportionné. |

---

## 🎨 Design System & Charte Graphique

### Palette de Couleurs
* **Bleu Primaire (OneLove Blue) :** `#0F4C81` & `#1478ff`
* **Orange Énergique (BTP / Actions) :** `#F97316`
* **Or Chaud (Prestige / Vedette) :** `#ffbf00`
* **Vert Émeraude (Succès / Validation) :** `#10b981`
* **Rouge Corail (Alertes / Suppression) :** `#ef4444`

### Typographie
* **Titres & Identité :** `'Poppins', sans-serif` (Graisses 500, 600, 700, 800)
* **Textes & Données chiffrées :** `'Inter', sans-serif` (Graisses 400, 500, 600)

---

## 🌓 Dark Mode & Tokens CSS

Le thème est géré via l'attribut `data-theme="dark"` sur la balise `<html>`. Un script anti-flash pré-exécuté dans le `<head>` élimine tout scintillement au chargement :

```css
/* Tokens Light Mode */
:root {
    --adm-bg: #f8fafc;
    --adm-card-bg: #ffffff;
    --adm-border: rgba(226, 232, 240, 0.85);
    --adm-sidebar-bg: #0b1a2e;
    --adm-primary: #0F4C81;
    --adm-primary-light: #1478ff;
    --adm-orange: #F97316;
    --adm-gold: #ffbf00;
}

/* Tokens Dark Mode */
html[data-theme="dark"] {
    --adm-bg: #090d14;
    --adm-card-bg: #161b22;
    --adm-border: rgba(48, 54, 61, 0.85);
    --adm-sidebar-bg: #0d1117;
}
```

---

## 🧩 Composants de l'Interface

### 1. Cartes Administrateur (`.adm-card`)
Conteneur standard pour regrouper formulaires, listes et graphiques.
```html
<div class="adm-card">
    <div class="adm-card-header">
        <h4><i class="fa-solid fa-house-chimney text-primary me-2"></i>Titre</h4>
        <a href="#" class="adm-btn adm-btn-primary">Action</a>
    </div>
    <div class="adm-card-body">
        <!-- Contenu -->
    </div>
</div>
```

### 2. Boutons d'Action (`.adm-btn`)
* `.adm-btn-primary` : Dégradé bleu OneLove avec ombre portée lumineuse.
* `.adm-btn-success` : Dégradé émeraude pour les ajouts de projet ou validations.
* `.adm-btn-danger` : Teinte rouge translucide avec bordure, passant au plein au survol.
* `.adm-btn-outline` : Bouton neutre bordé s'adaptant automatiquement au mode sombre.
* `.adm-btn-icon` : Bouton carré (36×36px) pour les actions rapides de tableau (Voir, Éditer, Supprimer).
* `.adm-btn-responsive` : S'adapte en pleine largeur sur mobile.

### 3. Contrôles de Formulaire (`.form-control`, `.form-select`)
* Coins arrondis `12px`.
* Halo bleu électrique au focus (`box-shadow: 0 0 0 3px rgba(20, 120, 255, 0.22)`).
* Rendu sombre automatique en dark mode (fond `#1c2330`, texte `#e6edf3`).

### 4. Badges d'État (`.adm-badge`)
* `.adm-badge-success` : Vert (À vendre, Traité, En ligne).
* `.adm-badge-warning` : Ambre (À louer, En cours, Non lu).
* `.adm-badge-danger` : Rouge (Nouveau, Urgent).
* `.adm-badge-info` : Cyan / Bleu ciel (Catégorie, Spécification).

---

## 🗂️ Détail des Modules & Vues Administrateur

### 1. Tableau de Bord (`resources/views/admin/dashboard.blade.php`)
* **Grille de KPIs :** 4 compteurs principaux (Biens, Catégories, Constructions, Utilisateurs) disposés en **2×2 sur mobile** et **1×4 sur desktop**.
* **Cartes de flux :** Suivi direct des nouvelles demandes de devis et des messages non lus avec pastilles d'alerte pulsantes.
* **Tableaux récents :** Les 5 derniers biens enregistrés et les 5 dernières demandes avec liens d'accès direct.
* **Actions rapides :** Raccourcis immédiats pour ajouter un bien, un chantier ou modifier les paramètres.

### 2. Gestion Immobilière (`resources/views/admin/properties/`)
* **`index.blade.php` :** Tableau complet des biens avec miniature, catégorie, prix formaté en FCFA, badge de statut et actions d'édition.
* **`create.blade.php` & `edit.blade.php` :** Formulaire structuré en sections numérotées (1. Infos générales, 2. Localisation & Prix, 3. Caractéristiques techniques, 4. Photos & Description) avec prévisualisation dynamique d'image.
* **`show.blade.php` :** Fiche détaillée avec bandeau prix, spécifications (Surface, Chambres, Salles de bain) et bouton direct vers la fiche publique.

### 3. Chantiers & BTP (`resources/views/admin/constructions/`)
* **`index.blade.php` :** Liste chronologique des projets avec état d'avancement (`en_cours`, `termine`, `a_venir`).
* **`create.blade.php` & `edit.blade.php` :** Formulaire avec saisie de ville, type de structure, descriptif technique et téléversement de plan/photo.
* **`show.blade.php` :** Fiche de suivi avec badge d'avancement et aperçu visuel plein format.

### 4. Catégories (`resources/views/admin/categories/`)
* **`index.blade.php` :** Tableau des catégories avec pastille d'icône colorée.
* **`create.blade.php` & `edit.blade.php` :** Formulaire avec **prévisualisation instantanée de l'icône FontAwesome** lors de la saisie (ex: `fa-house`, `fa-building`, `fa-tree`).

### 5. Demandes de Devis (`resources/views/admin/quotes/`)
* **`index.blade.php` :** Liste des demandes avec mise en avant des nouveaux dossiers.
* **`show.blade.php` :** Détail complet de la demande avec **barre d'actions rapides** :
  * 🟢 **WhatsApp :** Ouvre directement une conversation avec le client via le message prérempli.
  * 🔵 **Email :** Lance le client de messagerie avec l'objet préconfiguré.
  * 📞 **Appeler :** Déclenche l'appel téléphonique sur smartphone.
  * 🔄 **Bascule de statut :** Un clic pour passer de `Nouveau` ➔ `En cours` ➔ `Traité`.

### 6. Messages de Contact (`resources/views/admin/contacts/`)
* **`index.blade.php` :** Boîte de réception avec indicateur non-lu et avatar généré automatiquement aux initiales de l'expéditeur.
* **`show.blade.php` :** Consultation du message avec marquage automatique comme lu et bouton de réponse par WhatsApp, Appel ou Email.

### 7. Paramètres du Site (`resources/views/admin/settings/edit.blade.php`)
* **Images du site :** 6 zones de configuration pour la bannière Hero accueil, la bannière Construction, la section À propos et les 3 projets vitrine.
* **Coordonnées :** Adresse physique, téléphone principal et email de contact.
* **Réseaux sociaux :** Facebook, Instagram, LinkedIn et lien direct WhatsApp (avec fonction de test intégrée).
* **Chiffres clés de réputation :** Biens vendus, projets réalisés, clients satisfaits et années d'expérience.

---

## 🔒 Sécurité & Authentification

1. **Page de Connexion (`resources/views/auth/login.blade.php`) :**
   * Interface exécutive bi-volet (branding & showcase à gauche, formulaire sécurisé à droite).
   * Bouton œil interactif pour afficher/masquer le mot de passe.
   * Bascule de thème sombre/clair intégrée dès l'écran de connexion.
   * Signature WhatsApp du concepteur.

2. **Middleware d'Administration (`AdminMiddleware`) :**
   * Toutes les routes `/admin/*` sont protégées par le middleware `admin`.
   * Seuls les utilisateurs avec `is_admin = true` peuvent accéder au portail.
   * Toute tentative non autorisée est redirigée vers la page d'accueil ou le formulaire de connexion.

3. **Headers de Sécurité (`SecurityHeaders`) :**
   * Protection contre le clickjacking (`X-Frame-Options: SAMEORIGIN`).
   * Protection contre le reniflage MIME (`X-Content-Type-Options: nosniff`).
   * Politique de référent (`Referrer-Policy: strict-origin-when-cross-origin`).

4. **Verrouillage de l'enregistrement libre :**
   * La route `/register` a été désactivée/redirigée vers `/login` pour empêcher la création de comptes non autorisés.

---

## ✍️ Signature Concepteur & Contact

Conformément à la demande, la signature suivante est intégrée de façon harmonieuse dans le pied de page du site vitrine, de l'espace administration et sur la page de connexion :

* **Mention :** `Designed by : +242066819388`
* **Lien interactif WhatsApp :** `https://wa.me/242066819388`
* **Badge visuel :** Bouton stylisé avec icône WhatsApp officielle, coins arrondis et effet lumineux au survol.

---

## 🛠️ Commandes & Maintenance

### Lancement du projet en développement
```bash
# Terminal 1 : Serveur PHP Laravel
php artisan serve

# Terminal 2 : Compilation continue des assets Vite
npm run dev
```

### Compilation des assets pour la production
```bash
npm run build
```

### Nettoyage des caches (en cas de mise à jour des vues Blade ou de la configuration)
```bash
php artisan view:clear
php artisan route:clear
php artisan config:clear
```

---

*Document généré pour le projet **OneLove Immo** — Octobre 2026.*
