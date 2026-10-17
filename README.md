# 🏢 OneLove Immo — Plateforme Immobilière & Gestion BTP

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
  <img src="https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap 5">
  <img src="https://img.shields.io/badge/Design-Responsive-10B981?style=for-the-badge" alt="Responsive Design">
  <img src="https://img.shields.io/badge/Licence-Propriétaire-0F4C81?style=for-the-badge" alt="Licence">
</p>

---

## 📌 Présentation

**OneLove Immo** est une solution web complète, moderne et haute performance dédiée aux agences immobilières et aux entreprises du secteur BTP (Bâtiment et Travaux Publics). 

La plateforme associe un **site vitrine haut de gamme** conçu pour convertir les visiteurs en acquéreurs ou locataires, et un **portail d'administration complet et sécurisé** permettant de piloter l'ensemble de l'activité en temps réel.

---

## ✨ Fonctionnalités Principales

### 🏠 1. Vitrine Immobilière Publique
* **Catalogue de Biens Dynamique :** Consultation des biens à la vente et à la location (villas, appartements, duplex, terrains, immeubles, locaux commerciaux).
* **Moteur de Recherche Multicritère :** Filtres par mot-clé, type de bien, ville, statut de transaction et fourchette de budget.
* **Fiches Détaillées des Biens :** Caractéristiques techniques (surface, chambres, salles de bain, localisation exacte), galerie photos en haute résolution et contact direct WhatsApp/Email.
* **Biens en Vedette :** Mise en avant sur la page d'accueil des opportunités prioritaires de l'agence.

### 🏗️ 2. Pôle Construction & BTP
* **Portfolio des Réalisations :** Présentation soignée des chantiers en cours, terminés ou planifiés.
* **Demande de Devis en Ligne :** Formulaire interactif complet avec sélection du type de travaux, estimation budgétaire et téléversement de plans ou cahiers des charges.

### 🌓 3. Expérience Utilisateur & Dark Mode
* **Thème Sombre & Clair :** Bascule instantanée sans effet de scintillement au chargement (`pre-render theme script`).
* **Micro-interactions Fluides :** Animations soignées au survol, cartes élégantes avec effet de profondeur et design épuré.
* **Identité Visuelle Unique :** Dégradés bleu royal (`#0F4C81`), bleu électrique (`#1478ff`), touches orange énergique (`#F97316`) et or (`#ffbf00`).

### 📱 4. Ergonomie 100% Responsive
* **Adaptation Multi-Écrans :** Conception optimisée pour smartphones ultra-compacts (320px), téléphones standard, tablettes, ordinateurs portables et écrans 4K.
* **Tiroir Latéral Tactile (Offcanvas) :** Menu rétractable avec voile d'ombrage flouté sur mobile et tablette.
* **Contrôles Tactiles Ergonomiques :** Boutons d'actions rapides (WhatsApp, Appel, Email) facilement accessibles au pouce.

### 🛡️ 5. Espace Administration Exécutif
* **Tableau de Bord Intuitif :** Indicateurs clés de performance (KPIs) présentés en grille 2×2 claire sur mobile et 1×4 sur desktop.
* **Gestion du Catalogue :** Création, modification et suppression des biens et des catégories avec prévisualisation des icônes FontAwesome.
* **Gestion des Chantiers :** Ajout de photos, suivi de statut et descriptifs techniques des projets BTP.
* **Traitement des Devis & Contacts :** Boîte de réception centralisée avec mise à jour du statut en un clic (`Nouveau` ➔ `En cours` ➔ `Traité`).
* **Gestion des Paramètres du Site :** Personnalisation des bannières d'accueil, coordonnées officielles, réseaux sociaux et statistiques de réputation.

---

## 🔒 Sécurité & Robustesse

La plateforme intègre des normes de sécurité rigoureuses pour protéger les données de l'agence et de ses clients :

* **Middleware d'Authentification Dédié (`AdminMiddleware`) :** Protection stricte de l'ensemble des routes sous le préfixe `/admin/*`. Seuls les comptes authentifiés avec privilèges administrateurs peuvent y accéder.
* **En-têtes HTTP Sécurisés (`SecurityHeaders`) :** Protection active contre le détournement de clics (`X-Frame-Options: SAMEORIGIN`), le reniflage de type MIME (`X-Content-Type-Options: nosniff`) et politique de référent stricte.
* **Verrouillage des Inscriptions Publiques :** Fermeture de la création libre de comptes pour empêcher tout accès non sollicité.
* **Protection CSRF & Validation Robuste :** Tous les formulaires sont signés par jeton CSRF et soumis à une validation stricte côté serveur.
* **Stockage Sécurisé :** Les fichiers et pièces jointes des clients sont isolés dans le disque de stockage Laravel.

---

## 🛠️ Stack Technique

| Domaine | Technologies Utilisées |
| :--- | :--- |
| **Backend** | PHP 8.2+, Laravel 11 (Architecture MVC, Eloquent ORM) |
| **Frontend** | Blade Templates, HTML5 sémantique, JavaScript ES6+ |
| **Styling** | Vanilla CSS personnalisé + Bootstrap 5.3 + FontAwesome 6 |
| **Build Tool** | Vite 6 |
| **Base de Données** | MySQL / PostgreSQL / SQLite |
| **Typographie** | Google Fonts (Poppins & Inter) |

---

## 🚀 Installation & Démarrage Rapide

### Prérequis
* PHP ≥ 8.2 avec extensions : `pdo`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `curl`, `fileinfo`
* Composer ≥ 2.x
* Node.js ≥ 20.x et npm
* Base de données (MySQL, MariaDB ou SQLite)

### 1. Cloner le Dépôt
```bash
git clone https://github.com/applicationbuilder-web/oneloveimmo-update.git
cd oneloveimmo-update
```

### 2. Installer les Dépendances PHP
```bash
composer install
```

### 3. Installer les Dépendances JavaScript
```bash
npm install
```

### 4. Configuration de l'Environnement
Copiez le fichier d'exemple et configurez vos paramètres de base de données :
```bash
cp .env.example .env
php artisan key:generate
```

Éditez votre fichier `.env` avec les identifiants de votre base de données :
```env
APP_NAME="OneLove Immo"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=onelove_immo
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe
```

### 5. Migrations & Données Initiales
Exécutez les migrations pour structurer la base de données :
```bash
php artisan migrate --seed
```

Créez le lien symbolique pour les images et documents :
```bash
php artisan storage:link
```

### 6. Compilation des Assets & Lancement des Serveurs

Dans un premier terminal, lancez le serveur d'application :
```bash
php artisan serve
```

Dans un second terminal, démarrez le serveur Vite pour le rechargement à chaud :
```bash
npm run dev
```

L'application est accessible à l'adresse : **`http://localhost:8000`**

---

## 📦 Déploiement en Production

Pour compiler et optimiser les assets pour un hébergement en production :
```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📂 Structure du Projet

```
oneloveimmo/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/         # Contrôleurs du portail d'administration
│   │   │   └── Front/         # Contrôleurs du site vitrine public
│   │   └── Middleware/        # AdminMiddleware & SecurityHeaders
│   └── Models/                # Modèles Eloquent (Property, Category, Construction, etc.)
├── bootstrap/                 # Initialisation de l'application & middlewares globaux
├── database/
│   ├── migrations/            # Schémas de base de données
│   └── seeders/               # Données de démarrage
├── public/                    # Point d'entrée web (index.php, assets compilés)
├── resources/
│   ├── css/                   # app.css (Design system, variables & tokens)
│   ├── js/                    # app.js (Scripts frontend & toggles interactifs)
│   └── views/
│       ├── admin/             # Vues Blade de l'espace administration
│       ├── auth/              # Page de connexion sécurisée
│       ├── home/              # Sections de la page d'accueil
│       ├── layouts/           # Gabarits principaux (app.blade.php & admin.blade.php)
│       └── partials/          # Composants réutilisables (navbar, footer, cartes)
├── routes/
│   ├── auth.php               # Routes d'authentification
│   ├── console.php            # Commandes artisan personnalisées
│   └── web.php                # Routes web publiques et administratives
└── ADMIN_DOCUMENTATION.md     # Documentation détaillée de l'administration
```

---

## 📞 Concepteur & Contact

Pour toute demande d'assistance technique, personnalisation ou nouveau déploiement :

* **Concepteur :** ITOUA GUY BLANC PRINCE
* **Contact WhatsApp direct :** [+242 06 681 93 88](https://wa.me/242066819388?text=Bonjour,%20je%20vous%20contacte%20concernant%20le%20projet%20OneLove%20Immo.)
* **Signature :** `Designed by : +242066819388`

---

## 📄 Licence

Ce projet est la propriété exclusive de **OneLove Immo**. Tous droits réservés.
