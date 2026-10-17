import './bootstrap';

import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/* =============================================
   ONELOVE IMMO — THEME MANAGER (Dark / Light)
   Persistance via localStorage
   Application avant le premier rendu (évite le flash)
============================================= */
(function () {
    'use strict';

    const STORAGE_KEY = 'onelove-theme';
    const DARK        = 'dark';
    const LIGHT       = 'light';

    /**
     * Applique le thème sur l'élément <html>
     * @param {string} theme - 'dark' | 'light'
     */
    function applyTheme(theme) {
        if (theme === DARK) {
            document.documentElement.setAttribute('data-theme', DARK);
        } else {
            document.documentElement.removeAttribute('data-theme');
        }
        localStorage.setItem(STORAGE_KEY, theme);

        // Dispatch event pour d'autres scripts
        window.dispatchEvent(new CustomEvent('themechange', { detail: { theme } }));
    }

    /**
     * Lit le thème sauvegardé ou détecte la préférence système
     * @returns {string}
     */
    function getSavedTheme() {
        const saved = localStorage.getItem(STORAGE_KEY);
        if (saved === DARK || saved === LIGHT) return saved;
        // Détecte la préférence système
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? DARK : LIGHT;
    }

    /**
     * Bascule entre dark et light
     */
    function toggleTheme() {
        const current = document.documentElement.getAttribute('data-theme') === DARK ? DARK : LIGHT;
        applyTheme(current === DARK ? LIGHT : DARK);
    }

    // ── Application immédiate (avant le paint) ──────────────────
    applyTheme(getSavedTheme());

    // ── Branchement des boutons après chargement du DOM ─────────
    document.addEventListener('DOMContentLoaded', function () {

        // Écoute tous les boutons de toggle (desktop, mobile, admin)
        const toggleButtons = document.querySelectorAll('#themeToggleDesktop, #themeToggleMobile, #themeToggleAdmin, .theme-toggle-btn');
        toggleButtons.forEach(function (btn) {
            btn.addEventListener('click', toggleTheme);
            // Accessibilité : support clavier
            btn.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    toggleTheme();
                }
            });
        });

        // Écoute les changements de préférence système en temps réel
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function (e) {
            // Ne change que si l'utilisateur n'a pas fait de choix explicite
            if (!localStorage.getItem(STORAGE_KEY)) {
                applyTheme(e.matches ? DARK : LIGHT);
            }
        });
    });

    // Expose l'API pour usage global (ex. : depuis Blade ou Alpine)
    window.ThemeManager = {
        toggle: toggleTheme,
        setDark:  function () { applyTheme(DARK);  },
        setLight: function () { applyTheme(LIGHT); },
        current: function () {
            return document.documentElement.getAttribute('data-theme') === DARK ? DARK : LIGHT;
        },
    };
})();