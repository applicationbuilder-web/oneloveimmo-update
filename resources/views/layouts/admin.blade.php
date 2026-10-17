<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Administration') — OneLove Immo</title>

    {{-- Google Fonts : Poppins & Inter pour une cohérence parfaite avec le site --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    {{-- Script anti-flash : applique le thème immédiatement --}}
    <script>
        (function () {
            try {
                var theme = localStorage.getItem('onelove-theme');
                if (!theme) {
                    theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                }
                if (theme === 'dark') {
                    document.documentElement.setAttribute('data-theme', 'dark');
                }
            } catch (e) {}
        })();
    </script>

    {{-- CSS & JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ======================================================
           ADMIN — DESIGN SYSTEM MODERNE & HARMONISÉ
        ====================================================== */
        :root {
            --adm-sidebar-w: 270px;
            --adm-topbar-h: 70px;

            /* Light mode tokens */
            --adm-bg: #f8fafc;
            --adm-card-bg: #ffffff;
            --adm-border: rgba(226, 232, 240, 0.85);

            --adm-sidebar-bg: #0b1a2e;
            --adm-sidebar-hover: rgba(255, 255, 255, 0.07);
            --adm-sidebar-active: rgba(20, 120, 255, 0.16);
            --adm-sidebar-text: rgba(255, 255, 255, 0.75);
            --adm-sidebar-text-active: #ffffff;
            --adm-sidebar-accent: #ffbf00;

            --adm-primary: #0F4C81;
            --adm-primary-light: #1478ff;
            --adm-orange: #F97316;
            --adm-gold: #ffbf00;
            --adm-green: #10b981;
            --adm-red: #ef4444;

            --adm-shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
            --adm-shadow: 0 10px 30px -5px rgba(15, 76, 129, 0.08);
            --adm-shadow-lg: 0 20px 45px -10px rgba(15, 76, 129, 0.15);

            --adm-radius: 18px;
            --adm-transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * { box-sizing: border-box; }

        body.admin-body {
            font-family: 'Poppins', sans-serif;
            background: var(--adm-bg);
            color: #1e293b;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            overflow-x: hidden;
            transition: background-color 0.35s ease, color 0.35s ease;
        }

        /* ======================================================
           LAYOUT & SIDEBAR
        ====================================================== */
        .adm-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        .adm-sidebar {
            width: var(--adm-sidebar-w);
            background: var(--adm-sidebar-bg);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 1050;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.12) transparent;
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Logo zone */
        .adm-logo-zone {
            padding: 20px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.07);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .adm-brand-link {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none !important;
        }

        .adm-brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0F4C81 0%, #1478ff 100%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 18px rgba(15, 76, 129, 0.45);
            font-size: 18px;
            color: #ffffff;
            flex-shrink: 0;
        }

        .adm-brand-text strong {
            display: block;
            color: #ffffff;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: -0.3px;
        }

        .adm-brand-text span {
            color: rgba(255, 255, 255, 0.55);
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        /* Bouton fermeture du menu (Mobile / Tablette) */
        .adm-sidebar-close {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            cursor: pointer;
            transition: var(--adm-transition);
        }

        .adm-sidebar-close:hover {
            background: rgba(239, 68, 68, 0.85);
            color: #ffffff;
            transform: rotate(90deg);
        }

        /* Nav links */
        .adm-nav {
            padding: 18px 12px;
            flex: 1;
        }

        .adm-nav-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            color: rgba(255, 255, 255, 0.35);
            text-transform: uppercase;
            padding: 12px 14px 6px;
        }

        .adm-nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 16px;
            margin-bottom: 4px;
            border-radius: 12px;
            color: var(--adm-sidebar-text);
            text-decoration: none !important;
            font-size: 13.5px;
            font-weight: 500;
            transition: var(--adm-transition);
            position: relative;
        }

        .adm-nav-item:hover {
            background: var(--adm-sidebar-hover);
            color: #ffffff;
            transform: translateX(3px);
        }

        .adm-nav-item.active {
            background: linear-gradient(135deg, rgba(20, 120, 255, 0.22) 0%, rgba(15, 76, 129, 0.35) 100%);
            color: #ffffff;
            font-weight: 600;
            border: 1px solid rgba(20, 120, 255, 0.3);
        }

        .adm-nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: var(--adm-gold);
            border-radius: 0 4px 4px 0;
        }

        .adm-nav-item i {
            width: 22px;
            text-align: center;
            font-size: 16px;
            opacity: 0.9;
        }

        .adm-nav-badge {
            margin-left: auto;
            background: linear-gradient(135deg, #F97316 0%, #ffbf00 100%);
            color: #ffffff;
            font-size: 11px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 50px;
            min-width: 22px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(249, 115, 22, 0.4);
        }

        /* Sidebar footer */
        .adm-sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.07);
        }

        .adm-logout-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 13px;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 10px;
            transition: var(--adm-transition);
        }

        .adm-logout-link:hover {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        /* Backdrop overlay mobile/tablette */
        .adm-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .adm-backdrop.open {
            opacity: 1;
            visibility: visible;
        }

        body.adm-sidebar-locked {
            overflow: hidden;
        }

        /* ======================================================
           MAIN CONTENT & TOPBAR
        ====================================================== */
        .adm-main {
            margin-left: var(--adm-sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: calc(100% - var(--adm-sidebar-w));
            transition: margin-left 0.3s cubic-bezier(0.16, 1, 0.3, 1), width 0.3s ease;
        }

        .adm-topbar {
            height: var(--adm-topbar-h);
            background: var(--adm-card-bg);
            border-bottom: 1px solid var(--adm-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 1020;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.03);
            backdrop-filter: blur(10px);
        }

        .adm-topbar-title {
            font-size: 17px;
            font-weight: 700;
            color: #0d1b2a;
            letter-spacing: -0.3px;
            margin-bottom: 2px;
        }

        .adm-topbar-subtitle {
            font-size: 12px;
            color: #64748b;
            font-weight: 400;
        }

        .adm-topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .adm-topbar-btn {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            border: 1px solid var(--adm-border);
            background: var(--adm-card-bg);
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--adm-transition);
            position: relative;
            text-decoration: none;
            flex-shrink: 0;
        }

        .adm-topbar-btn:hover {
            background: rgba(15, 76, 129, 0.08);
            color: var(--adm-primary);
            border-color: rgba(15, 76, 129, 0.25);
            transform: translateY(-2px);
        }

        .adm-topbar-notif-dot {
            position: absolute;
            top: 7px;
            right: 7px;
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            border: 2px solid var(--adm-card-bg);
            animation: pulse-dot 2s infinite;
        }

        @keyframes pulse-dot {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(239, 68, 68, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }

        .adm-topbar-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #0F4C81 0%, #1478ff 100%);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            box-shadow: 0 4px 12px rgba(15, 76, 129, 0.25);
            flex-shrink: 0;
        }

        .adm-topbar-user {
            text-align: right;
            line-height: 1.2;
        }

        .adm-topbar-user strong {
            display: block;
            font-size: 13px;
            color: #0d1b2a;
            font-weight: 600;
        }

        .adm-topbar-user span {
            font-size: 11px;
            color: #64748b;
        }

        /* ======================================================
           PAGE CONTENT, CARDS & TABLES
        ====================================================== */
        .adm-page {
            padding: 30px;
            flex: 1;
            width: 100%;
        }

        .adm-card {
            background: var(--adm-card-bg);
            border-radius: var(--adm-radius);
            border: 1px solid var(--adm-border);
            box-shadow: var(--adm-shadow);
            overflow: hidden;
            margin-bottom: 24px;
            transition: var(--adm-transition);
        }

        .adm-card:hover {
            box-shadow: var(--adm-shadow-lg);
        }

        .adm-card-header {
            padding: 20px 26px;
            border-bottom: 1px solid var(--adm-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .adm-card-header h4 {
            font-size: 16px;
            font-weight: 700;
            color: #0d1b2a;
            margin: 0;
        }

        .adm-card-header p {
            font-size: 13px;
            color: #64748b;
            margin: 3px 0 0;
        }

        .adm-card-body {
            padding: 26px;
        }

        /* Tables */
        .adm-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13.5px;
        }

        .adm-table th {
            padding: 13px 18px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            color: #64748b;
            background: rgba(248, 250, 252, 0.95);
            border-bottom: 1px solid var(--adm-border);
            white-space: nowrap;
        }

        .adm-table td {
            padding: 14px 18px;
            color: #1e293b;
            border-bottom: 1px solid rgba(226, 232, 240, 0.7);
            vertical-align: middle;
        }

        .adm-table tbody tr:hover td {
            background: rgba(15, 76, 129, 0.025);
        }

        .adm-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Boutons Admin */
        .adm-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 9px 18px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: var(--adm-transition);
            text-decoration: none !important;
            white-space: nowrap;
        }

        .adm-btn:hover {
            transform: translateY(-2px);
        }

        .adm-btn-primary {
            background: linear-gradient(135deg, #0F4C81 0%, #1478ff 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(15, 76, 129, 0.25);
        }

        .adm-btn-primary:hover {
            box-shadow: 0 8px 22px rgba(15, 76, 129, 0.35);
            color: #ffffff !important;
        }

        .adm-btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.25);
        }

        .adm-btn-success:hover {
            box-shadow: 0 8px 22px rgba(16, 185, 129, 0.35);
            color: #ffffff !important;
        }

        .adm-btn-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444 !important;
            border: 1px solid rgba(239, 68, 68, 0.25);
        }

        .adm-btn-danger:hover {
            background: #ef4444;
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(239, 68, 68, 0.3);
        }

        .adm-btn-outline {
            background: var(--adm-card-bg);
            border: 1px solid var(--adm-border);
            color: #475569 !important;
        }

        .adm-btn-outline:hover {
            background: rgba(15, 76, 129, 0.06);
            color: var(--adm-primary) !important;
            border-color: rgba(15, 76, 129, 0.25);
        }

        .adm-btn-icon {
            width: 36px;
            height: 36px;
            padding: 0;
            border-radius: 10px;
        }

        /* Badges */
        .adm-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 11px;
            border-radius: 50px;
            font-size: 11.5px;
            font-weight: 600;
        }

        .adm-badge-success { background: #dcfce7; color: #15803d; border: 1px solid #bbf7d0; }
        .adm-badge-warning { background: #fef3c7; color: #b45309; border: 1px solid #fde68a; }
        .adm-badge-danger  { background: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; }
        .adm-badge-info    { background: #e0f2fe; color: #0369a1; border: 1px solid #bae6fd; }
        .adm-badge-primary { background: rgba(15, 76, 129, 0.1); color: #0F4C81; border: 1px solid rgba(15, 76, 129, 0.2); }

        /* Form Controls & Inputs */
        .adm-page .form-control,
        .adm-page .form-select {
            background-color: var(--adm-card-bg);
            border: 1px solid var(--adm-border);
            color: #1e293b;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 13.5px;
            font-family: 'Poppins', sans-serif;
            transition: var(--adm-transition);
        }

        .adm-page .form-control:focus,
        .adm-page .form-select:focus {
            background-color: var(--adm-card-bg);
            border-color: #1478ff;
            box-shadow: 0 0 0 3px rgba(20, 120, 255, 0.22);
            color: #0F4C81;
            outline: none;
        }

        .adm-page .form-control::placeholder {
            color: #94a3b8;
            opacity: 0.85;
        }

        .adm-page .input-group-text {
            background-color: rgba(248, 250, 252, 0.95);
            border: 1px solid var(--adm-border);
            color: #64748b;
            border-radius: 12px;
            font-size: 13.5px;
        }

        .adm-page label.form-label {
            font-size: 13px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 6px;
        }

        .adm-page .form-text {
            font-size: 12px;
            color: #64748b;
            margin-top: 5px;
        }

        .adm-form-section-title {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #64748b;
            padding-bottom: 8px;
            margin-bottom: 18px;
            border-bottom: 2px solid var(--adm-border);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .adm-form-section-title::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0F4C81, #1478ff);
        }

        /* Table custom scrollbar & responsive enhancements */
        .table-responsive {
            -webkit-overflow-scrolling: touch;
            scrollbar-width: thin;
            scrollbar-color: rgba(15, 76, 129, 0.2) transparent;
        }

        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: rgba(15, 76, 129, 0.2);
            border-radius: 10px;
        }

        /* ======================================================
           DARK MODE — ADMIN THEME OVERRIDES
        ====================================================== */
        html[data-theme="dark"] {
            --adm-bg: #090d14;
            --adm-card-bg: #161b22;
            --adm-border: rgba(48, 54, 61, 0.85);
            --adm-sidebar-bg: #0d1117;
            --adm-sidebar-hover: rgba(255, 255, 255, 0.05);
            --adm-sidebar-active: rgba(20, 120, 255, 0.18);
            --adm-sidebar-text: rgba(255, 255, 255, 0.7);
        }

        html[data-theme="dark"] body.admin-body {
            background: #090d14;
            color: #e6edf3;
        }

        html[data-theme="dark"] .adm-topbar {
            background: #161b22;
            border-bottom: 1px solid #30363d;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.35);
        }

        html[data-theme="dark"] .adm-topbar-title {
            color: #e6edf3;
        }

        html[data-theme="dark"] .adm-topbar-subtitle {
            color: #8b949e;
        }

        html[data-theme="dark"] .adm-topbar-user strong {
            color: #e6edf3;
        }

        html[data-theme="dark"] .adm-topbar-user span {
            color: #8b949e;
        }

        html[data-theme="dark"] .adm-topbar-btn {
            background: #1c2330;
            border-color: #30363d;
            color: #c9d1d9;
        }

        html[data-theme="dark"] .adm-topbar-btn:hover {
            background: #252d3d;
            color: #ffffff;
            border-color: #485363;
        }

        html[data-theme="dark"] .adm-card {
            background: #161b22;
            border: 1px solid #30363d;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        }

        html[data-theme="dark"] .adm-card-header {
            border-bottom: 1px solid #30363d;
        }

        html[data-theme="dark"] .adm-card-header h4,
        html[data-theme="dark"] .adm-card-header h5 {
            color: #e6edf3 !important;
        }

        html[data-theme="dark"] .adm-card-header p {
            color: #8b949e;
        }

        html[data-theme="dark"] .adm-table th {
            background: #1c2330;
            color: #e6edf3;
            border-color: #30363d;
        }

        html[data-theme="dark"] .adm-table td {
            color: #c9d1d9;
            border-color: #30363d;
        }

        html[data-theme="dark"] .adm-table tbody tr:hover td {
            background: rgba(255, 255, 255, 0.035);
        }

        html[data-theme="dark"] .adm-btn-outline {
            background: #1c2330;
            border-color: #30363d;
            color: #c9d1d9 !important;
        }

        html[data-theme="dark"] .adm-btn-outline:hover {
            background: #252d3d;
            color: #ffffff !important;
        }

        html[data-theme="dark"] .adm-badge-primary {
            background: rgba(20, 120, 255, 0.15);
            color: #60a5fa;
            border-color: rgba(20, 120, 255, 0.3);
        }

        /* Dark mode Form Controls */
        html[data-theme="dark"] .adm-page .form-control,
        html[data-theme="dark"] .adm-page .form-select {
            background-color: #1c2330 !important;
            border-color: #30363d !important;
            color: #e6edf3 !important;
        }

        html[data-theme="dark"] .adm-page .form-control:focus,
        html[data-theme="dark"] .adm-page .form-select:focus {
            background-color: #1c2330 !important;
            border-color: #1478ff !important;
            box-shadow: 0 0 0 3px rgba(20, 120, 255, 0.25) !important;
            color: #ffffff !important;
        }

        html[data-theme="dark"] .adm-page .form-control::placeholder {
            color: #6e7681 !important;
        }

        html[data-theme="dark"] .adm-page .input-group-text {
            background-color: #161b22 !important;
            border-color: #30363d !important;
            color: #8b949e !important;
        }

        html[data-theme="dark"] .adm-page label.form-label,
        html[data-theme="dark"] .adm-page .form-check-label {
            color: #e6edf3 !important;
        }

        html[data-theme="dark"] .adm-page .form-text {
            color: #8b949e !important;
        }

        html[data-theme="dark"] .adm-form-section-title {
            color: #8b949e;
            border-color: #30363d;
        }

        /* Dark mode adapt light container backgrounds in admin views */
        html[data-theme="dark"] .adm-page [style*="background:#f8fafc"],
        html[data-theme="dark"] .adm-page [style*="background: #f8fafc"],
        html[data-theme="dark"] .adm-page [style*="background:#eff6ff"],
        html[data-theme="dark"] .adm-page [style*="background: #eff6ff"],
        html[data-theme="dark"] .adm-page [style*="background:#fffbf7"],
        html[data-theme="dark"] .adm-page [style*="background: #fffbf7"],
        html[data-theme="dark"] .adm-page .bg-light,
        html[data-theme="dark"] .adm-page .bg-white {
            background-color: #1c2330 !important;
            border-color: #30363d !important;
            color: #e6edf3 !important;
        }

        html[data-theme="dark"] .adm-page [style*="color:#0d1b2a"],
        html[data-theme="dark"] .adm-page [style*="color: #0d1b2a"],
        html[data-theme="dark"] .adm-page [style*="color:#1e293b"],
        html[data-theme="dark"] .adm-page [style*="color: #1e293b"] {
            color: #e6edf3 !important;
        }

        html[data-theme="dark"] .adm-page [style*="color:#64748b"],
        html[data-theme="dark"] .adm-page [style*="color: #64748b"],
        html[data-theme="dark"] .adm-page [style*="color:#94a3b8"],
        html[data-theme="dark"] .adm-page [style*="color: #94a3b8"],
        html[data-theme="dark"] .adm-page [style*="color:#334155"] {
            color: #8b949e !important;
        }

        /* ======================================================
           RESPONSIVE SYSTEM (TOUT ÉCRAN : Mobiles, Tablettes, PC)
        ====================================================== */
        /* Tablettes et Mobiles (< 992px) */
        @media (max-width: 991.98px) {
            .adm-sidebar {
                width: 280px;
                transform: translateX(-100%);
                box-shadow: 0 0 50px rgba(0, 0, 0, 0.65);
            }

            .adm-sidebar.open {
                transform: translateX(0);
            }

            .adm-main {
                margin-left: 0 !important;
                width: 100% !important;
            }

            .adm-topbar {
                padding: 0 16px;
            }

            .adm-page {
                padding: 22px 16px;
            }
        }

        /* Mobiles & Petits écrans (< 576px) */
        @media (max-width: 575.98px) {
            .adm-topbar {
                height: 60px;
                padding: 0 12px;
            }

            .adm-topbar-title {
                font-size: 15px;
            }

            .adm-topbar-subtitle {
                display: none !important;
            }

            .adm-topbar-right {
                gap: 6px;
            }

            .adm-topbar-btn {
                width: 36px;
                height: 36px;
                font-size: 13px;
                border-radius: 10px;
            }

            .adm-topbar-avatar {
                width: 36px;
                height: 36px;
                font-size: 13px;
                border-radius: 10px;
            }

            .adm-topbar-user {
                display: none !important;
            }

            .adm-page {
                padding: 14px 10px;
            }

            .adm-card {
                border-radius: 14px;
                margin-bottom: 18px;
            }

            .adm-card-header {
                padding: 14px 16px;
                flex-direction: column;
                align-items: stretch !important;
                gap: 12px;
            }

            .adm-card-header .adm-btn {
                width: 100%;
                justify-content: center;
            }

            .adm-card-body {
                padding: 14px;
            }

            .adm-table th, .adm-table td {
                padding: 10px 10px;
                font-size: 12px;
            }

            /* Responsive button stack */
            .adm-btn-responsive {
                width: 100%;
                justify-content: center;
            }

            .adm-mobile-stack {
                flex-direction: column !important;
                align-items: stretch !important;
            }

            .adm-mobile-stack > * {
                width: 100% !important;
            }
        }

        /* Grands écrans (>= 1400px) */
        @media (min-width: 1400px) {
            .adm-page {
                padding: 34px 40px;
            }
        }
    </style>
</head>

<body class="admin-body">

{{-- Voile d'ombrage semi-transparent pour mobile/tablette --}}
<div class="adm-backdrop" id="admBackdrop" onclick="toggleSidebar()"></div>

<div class="adm-wrapper">

    {{-- ============================================================
         SIDEBAR (Menu latéral rétractable sur mobile & tablette)
    ============================================================ --}}
    <aside class="adm-sidebar" id="admSidebar" aria-label="Menu latéral d'administration">

        {{-- Logo OneLove Immo harmonisé avec le site --}}
        <div class="adm-logo-zone">
            <a href="{{ route('admin.dashboard') }}" class="adm-brand-link">
                <div class="adm-brand-icon">
                    <i class="fa-solid fa-house-chimney"></i>
                </div>
                <div class="adm-brand-text">
                    <strong>OneLove <span class="text-warning">Immo</span></strong>
                    <span>Espace Administration</span>
                </div>
            </a>
            <button class="adm-sidebar-close d-lg-none" onclick="toggleSidebar()" title="Fermer le menu" aria-label="Fermer le menu">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        {{-- Navigation --}}
        <nav class="adm-nav">

            <div class="adm-nav-label">Tableau de bord</div>

            <a href="{{ route('admin.dashboard') }}"
               class="adm-nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-gauge-high"></i>
                Vue d'ensemble
            </a>

            <div class="adm-nav-label">Gestion Immobilière</div>

            <a href="{{ route('admin.properties.index') }}"
               class="adm-nav-item {{ request()->routeIs('admin.properties.*') ? 'active' : '' }}">
                <i class="fa-solid fa-house-chimney"></i>
                Biens immobiliers
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="adm-nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="fa-solid fa-layer-group"></i>
                Catégories
            </a>

            <a href="{{ route('admin.constructions.index') }}"
               class="adm-nav-item {{ request()->routeIs('admin.constructions.*') ? 'active' : '' }}">
                <i class="fa-solid fa-building"></i>
                Constructions & BTP
            </a>

            <div class="adm-nav-label">Clients & Prospects</div>

            <a href="{{ route('admin.quotes.index') }}"
               class="adm-nav-item {{ request()->routeIs('admin.quotes.*') ? 'active' : '' }}">
                <i class="fa-solid fa-file-signature"></i>
                Demandes de devis
                @php $qCount = \App\Models\Quote::where('status','nouveau')->count(); @endphp
                @if($qCount > 0)
                    <span class="adm-nav-badge">{{ $qCount }}</span>
                @endif
            </a>

            <a href="{{ route('admin.contacts.index') }}"
               class="adm-nav-item {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="fa-solid fa-envelope"></i>
                Messages de contact
                @php $cCount = \App\Models\Contact::where('is_read', false)->count(); @endphp
                @if($cCount > 0)
                    <span class="adm-nav-badge">{{ $cCount }}</span>
                @endif
            </a>

            <div class="adm-nav-label">Système & Site</div>

            <a href="{{ route('admin.settings.edit') }}"
               class="adm-nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="fa-solid fa-sliders"></i>
                Paramètres du site
            </a>

            <a href="{{ route('home') }}" target="_blank" class="adm-nav-item">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                Voir le site public
            </a>

        </nav>

        {{-- Footer Sidebar : Déconnexion --}}
        <div class="adm-sidebar-footer">
            <form method="POST" action="{{ route('logout') }}" id="logoutForm" class="d-none">
                @csrf
            </form>
            <a href="#" class="adm-logout-link" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>
                Déconnexion
            </a>
        </div>

    </aside>

    {{-- ============================================================
         CONTENU PRINCIPAL
    ============================================================ --}}
    <div class="adm-main">

        {{-- TOPBAR STICKY --}}
        <header class="adm-topbar">
            <div class="d-flex align-items-center gap-3">
                {{-- Bouton Hamburger (affiché sur écrans < 992px) --}}
                <button class="adm-topbar-btn d-lg-none" onclick="toggleSidebar()" title="Ouvrir le menu latéral" aria-label="Menu">
                    <i class="fa-solid fa-bars" style="font-size:16px;"></i>
                </button>
                <div>
                    <div class="adm-topbar-title">@yield('page-title', 'Tableau de bord')</div>
                    <div class="adm-topbar-subtitle">@yield('page-subtitle', 'OneLove Immo — Espace Administration')</div>
                </div>
            </div>

            <div class="adm-topbar-right">

                {{-- Toggle Thème Dark / Light --}}
                <button class="adm-topbar-btn theme-toggle-btn"
                        id="themeToggleAdmin"
                        title="Basculer le mode sombre / clair"
                        aria-label="Changer le thème">
                    <i class="fa-solid fa-sun icon-sun"></i>
                    <i class="fa-solid fa-moon icon-moon"></i>
                </button>

                {{-- Lien direct vers le site public --}}
                <a href="{{ route('home') }}" target="_blank" class="adm-topbar-btn" title="Aperçu du site public">
                    <i class="fa-solid fa-eye" style="font-size:14px;"></i>
                </a>

                {{-- Notifications devis & contacts --}}
                <a href="{{ route('admin.quotes.index') }}" class="adm-topbar-btn" title="Demandes et notifications">
                    <i class="fa-solid fa-bell" style="font-size:14px;"></i>
                    @php $notif = \App\Models\Quote::where('status','nouveau')->count() + \App\Models\Contact::where('is_read', false)->count(); @endphp
                    @if($notif > 0)
                        <span class="adm-topbar-notif-dot"></span>
                    @endif
                </a>

                {{-- Profil Administrateur --}}
                <div class="d-flex align-items-center gap-2 ps-lg-2">
                    <div class="adm-topbar-user d-none d-md-block">
                        <strong>{{ auth()->user()?->name ?? 'Administrateur' }}</strong>
                        <span>{{ auth()->user()?->email }}</span>
                    </div>
                    <div class="adm-topbar-avatar" title="{{ auth()->user()?->name ?? 'Administrateur' }}">
                        {{ strtoupper(substr(auth()->user()?->name ?? 'A', 0, 1)) }}
                    </div>
                </div>

            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <main class="adm-page">

            {{-- Alertes de succès --}}
            @if(session('success'))
                <div class="alert alert-success d-flex align-items-center gap-2 rounded-4 shadow-sm mb-4" role="alert">
                    <i class="fa-solid fa-circle-check fs-5 text-success"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            {{-- Alertes d'erreurs --}}
            @if($errors->any())
                <div class="alert alert-danger d-flex align-items-start gap-2 rounded-4 shadow-sm mb-4" role="alert">
                    <i class="fa-solid fa-triangle-exclamation fs-5 text-danger mt-1"></i>
                    <div>
                        <strong>Veuillez vérifier les informations saisies :</strong>
                        <ul class="mb-0 mt-1 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')

            {{-- Signature Concepteur & Copyright --}}
            <footer class="mt-5 pt-4 pb-2 border-top text-center text-md-start d-flex flex-column flex-md-row justify-content-between align-items-center gap-3" style="border-color: var(--adm-border) !important; font-size: 13px; color: #94a3b8;">
                <div>
                    © {{ date('Y') }} <strong>OneLove Immo</strong> — Panneau d'administration.
                </div>
                <div class="d-flex align-items-center flex-wrap justify-content-center gap-2">
                    <span>Designed by :</span>
                    <a href="https://wa.me/242066819388?text={{ urlencode('Bonjour, je vous contacte concernant le design du portail OneLove Immo.') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="designer-badge"
                       title="WhatsApp Concepteur">
                        <i class="fa-brands fa-whatsapp fs-6"></i>
                        <span>+242066819388</span>
                    </a>
                </div>
            </footer>

        </main>

    </div>
</div>

@stack('scripts')

{{-- Script de contrôle du tiroir latéral responsive --}}
<script>
    const sidebar = document.getElementById('admSidebar');
    const backdrop = document.getElementById('admBackdrop');

    function toggleSidebar() {
        if (!sidebar) return;
        const isOpen = sidebar.classList.toggle('open');
        if (backdrop) {
            backdrop.classList.toggle('open', isOpen);
        }
        document.body.classList.toggle('adm-sidebar-locked', isOpen);
    }

    // Fermeture automatique au clic sur un lien du menu sur écran tactile/mobile
    document.addEventListener('DOMContentLoaded', function () {
        if (window.innerWidth < 992) {
            const navLinks = document.querySelectorAll('.adm-nav-item');
            navLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    if (sidebar && sidebar.classList.contains('open')) {
                        toggleSidebar();
                    }
                });
            });
        }
    });
</script>

</body>
</html>