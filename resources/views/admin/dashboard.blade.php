@extends('layouts.admin')

@section('title', 'Tableau de bord')
@section('page-title', 'Tableau de bord')
@section('page-subtitle', 'Vue d\'ensemble de votre activité immobilière')

@section('content')

{{-- ============================================================
     STATS KPI CARDS
============================================================ --}}
<div class="row g-2 g-sm-3 mb-3 mb-md-4">

    {{-- Biens immobiliers --}}
    <div class="col-6 col-md-6 col-xl-3">
        <div class="adm-kpi-card" style="--kpi-color: #1478ff; --kpi-bg: #eff6ff;">
            <div class="adm-kpi-icon">
                <i class="fa-solid fa-house-chimney"></i>
            </div>
            <div class="adm-kpi-body">
                <span class="adm-kpi-value">{{ $totalProperties }}</span>
                <span class="adm-kpi-label">Biens immobiliers</span>
            </div>
            <a href="{{ route('admin.properties.index') }}" class="adm-kpi-link">
                Voir <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Catégories --}}
    <div class="col-6 col-md-6 col-xl-3">
        <div class="adm-kpi-card" style="--kpi-color: #8b5cf6; --kpi-bg: #f5f3ff;">
            <div class="adm-kpi-icon">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <div class="adm-kpi-body">
                <span class="adm-kpi-value">{{ $totalCategories }}</span>
                <span class="adm-kpi-label">Catégories</span>
            </div>
            <a href="{{ route('admin.categories.index') }}" class="adm-kpi-link">
                Voir <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Constructions --}}
    <div class="col-6 col-md-6 col-xl-3">
        <div class="adm-kpi-card" style="--kpi-color: #f97316; --kpi-bg: #fff7ed;">
            <div class="adm-kpi-icon">
                <i class="fa-solid fa-building"></i>
            </div>
            <div class="adm-kpi-body">
                <span class="adm-kpi-value">{{ $totalProjects }}</span>
                <span class="adm-kpi-label">Constructions</span>
            </div>
            <a href="{{ route('admin.constructions.index') }}" class="adm-kpi-link">
                Voir <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    {{-- Utilisateurs --}}
    <div class="col-6 col-md-6 col-xl-3">
        <div class="adm-kpi-card" style="--kpi-color: #10b981; --kpi-bg: #f0fdf4;">
            <div class="adm-kpi-icon">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="adm-kpi-body">
                <span class="adm-kpi-value">{{ $totalUsers }}</span>
                <span class="adm-kpi-label">Utilisateurs</span>
            </div>
            <a href="#" class="adm-kpi-link">
                Voir <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

</div>


{{-- ============================================================
     2ème LIGNE : Demandes + Messages
============================================================ --}}
<div class="row g-3 mb-4">

    <div class="col-md-6">
        <div class="adm-kpi-card" style="--kpi-color: #ef4444; --kpi-bg: #fef2f2;">
            <div class="adm-kpi-icon">
                <i class="fa-solid fa-file-signature"></i>
            </div>
            <div class="adm-kpi-body">
                <span class="adm-kpi-value">{{ $totalQuotes }}</span>
                <span class="adm-kpi-label">Demandes de devis</span>
                @if($newQuotes > 0)
                    <span class="adm-badge adm-badge-danger ms-2">{{ $newQuotes }} nouveau(x)</span>
                @endif
            </div>
            <a href="{{ route('admin.quotes.index') }}" class="adm-kpi-link">
                Voir <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="adm-kpi-card" style="--kpi-color: #0ea5e9; --kpi-bg: #f0f9ff;">
            <div class="adm-kpi-icon">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="adm-kpi-body">
                <span class="adm-kpi-value">{{ $totalContacts }}</span>
                <span class="adm-kpi-label">Messages reçus</span>
                @if($unreadContacts > 0)
                    <span class="adm-badge adm-badge-warning ms-2">{{ $unreadContacts }} non lu(s)</span>
                @endif
            </div>
            <a href="{{ route('admin.contacts.index') }}" class="adm-kpi-link">
                Voir <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

</div>


{{-- ============================================================
     DERNIERS BIENS + DERNIERS DEVIS
============================================================ --}}
<div class="row g-3">

    {{-- Derniers biens ajoutés --}}
    <div class="col-lg-7">
        <div class="adm-card">
            <div class="adm-card-header">
                <div>
                    <h4><i class="fa-solid fa-house-chimney me-2" style="color:#1478ff;"></i>Derniers biens ajoutés</h4>
                    <p>Les 5 derniers biens immobiliers enregistrés</p>
                </div>
                <a href="{{ route('admin.properties.create') }}" class="adm-btn adm-btn-primary">
                    <i class="fa-solid fa-plus"></i> Ajouter
                </a>
            </div>
            <div class="adm-card-body p-0">
                <div class="table-responsive">
                    <table class="adm-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestProperties as $p)
                            <tr>
                                <td>
                                    @php $img = $p->image ? asset('storage/'.$p->image) : asset('assets/images/no-image.jpg'); @endphp
                                    <img src="{{ $img }}" alt="{{ $p->title }}"
                                         style="width:52px;height:38px;object-fit:cover;border-radius:8px;">
                                </td>
                                <td>
                                    <strong style="font-size:13px;">{{ Str::limit($p->title,30) }}</strong>
                                    <div style="font-size:11px;color:#94a3b8;">{{ $p->city }}</div>
                                </td>
                                <td style="font-size:13px;font-weight:600;white-space:nowrap;">
                                    {{ number_format($p->price,0,',',' ') }} <small>FCFA</small>
                                </td>
                                <td>
                                    @if($p->status == 'a_vendre')
                                        <span class="adm-badge adm-badge-success">À vendre</span>
                                    @else
                                        <span class="adm-badge adm-badge-warning">À louer</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.properties.edit',$p) }}"
                                       class="adm-btn adm-btn-outline adm-btn-icon" title="Modifier">
                                        <i class="fa-solid fa-pen" style="font-size:12px;"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center" style="padding:32px;color:#94a3b8;">
                                    <i class="fa-solid fa-house-circle-xmark fa-2x mb-2" style="display:block;"></i>
                                    Aucun bien enregistré
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($totalProperties > 5)
                <div style="padding:14px 24px;border-top:1px solid #f1f5f9;">
                    <a href="{{ route('admin.properties.index') }}" style="font-size:13px;color:#1478ff;font-weight:600;text-decoration:none;">
                        Voir tous les biens <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Dernières demandes de devis --}}
    <div class="col-lg-5">
        <div class="adm-card">
            <div class="adm-card-header">
                <div>
                    <h4><i class="fa-solid fa-file-signature me-2" style="color:#ef4444;"></i>Dernières demandes</h4>
                    <p>Demandes de devis récentes</p>
                </div>
                @if($newQuotes > 0)
                    <span class="adm-badge adm-badge-danger">{{ $newQuotes }} nouveau(x)</span>
                @endif
            </div>
            <div class="adm-card-body p-0">
                <div class="table-responsive">
                    <table class="adm-table">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Projet</th>
                                <th>Statut</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestQuotes as $q)
                            <tr>
                                <td>
                                    <strong style="font-size:13px;">{{ $q->fullname }}</strong>
                                    <div style="font-size:11px;color:#94a3b8;">{{ $q->phone }}</div>
                                </td>
                                <td style="font-size:12px;">{{ Str::limit($q->project_type,20) }}</td>
                                <td>
                                    @if($q->status == 'nouveau')
                                        <span class="adm-badge adm-badge-danger">Nouveau</span>
                                    @elseif($q->status == 'en_cours')
                                        <span class="adm-badge adm-badge-warning">En cours</span>
                                    @else
                                        <span class="adm-badge adm-badge-success">Traité</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.quotes.show',$q) }}"
                                       class="adm-btn adm-btn-outline adm-btn-icon" title="Voir">
                                        <i class="fa-solid fa-eye" style="font-size:12px;"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center" style="padding:32px;color:#94a3b8;">
                                    <i class="fa-solid fa-file-circle-xmark fa-2x mb-2" style="display:block;"></i>
                                    Aucune demande
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($totalQuotes > 5)
                <div style="padding:14px 24px;border-top:1px solid #f1f5f9;">
                    <a href="{{ route('admin.quotes.index') }}" style="font-size:13px;color:#ef4444;font-weight:600;text-decoration:none;">
                        Voir toutes les demandes <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>


{{-- ============================================================
     ACTIONS RAPIDES
============================================================ --}}
<div class="adm-card mt-3">
    <div class="adm-card-header">
        <div>
            <h4><i class="fa-solid fa-bolt me-2" style="color:#f97316;"></i>Actions rapides</h4>
            <p>Raccourcis vers les actions les plus fréquentes</p>
        </div>
    </div>
    <div class="adm-card-body">
        <div class="d-flex flex-wrap gap-3">
            <a href="{{ route('admin.properties.create') }}" class="adm-btn adm-btn-primary">
                <i class="fa-solid fa-plus"></i> Ajouter un bien
            </a>
            <a href="{{ route('admin.constructions.create') }}" class="adm-btn adm-btn-success">
                <i class="fa-solid fa-building"></i> Ajouter une construction
            </a>
            <a href="{{ route('admin.categories.create') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-layer-group"></i> Nouvelle catégorie
            </a>
            <a href="{{ route('admin.settings.edit') }}" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-sliders"></i> Paramètres du site
            </a>
            <a href="{{ route('home') }}" target="_blank" class="adm-btn adm-btn-outline">
                <i class="fa-solid fa-eye"></i> Voir le site
            </a>
        </div>
    </div>
</div>


{{-- KPI Cards styles --}}
<style>
.adm-kpi-card {
    background: #fff;
    border: 1px solid #e8ecf0;
    border-radius: 14px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    box-shadow: 0 1px 4px rgba(0,0,0,.04);
    transition: all .25s cubic-bezier(.16,1,.3,1);
    position: relative;
    overflow: hidden;
}
.adm-kpi-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(0,0,0,.08);
    border-color: var(--kpi-color);
}
.adm-kpi-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 4px; height: 100%;
    background: var(--kpi-color);
    border-radius: 14px 0 0 14px;
}
.adm-kpi-icon {
    width: 52px; height: 52px;
    border-radius: 13px;
    background: var(--kpi-bg);
    color: var(--kpi-color);
    display: flex; align-items: center; justify-content: center;
    font-size: 22px;
    flex-shrink: 0;
}
.adm-kpi-body { flex: 1; }
.adm-kpi-value {
    display: block;
    font-size: 28px;
    font-weight: 800;
    color: #1e293b;
    line-height: 1;
    margin-bottom: 3px;
}
.adm-kpi-label {
    font-size: 12px;
    color: #94a3b8;
    font-weight: 500;
}
.adm-kpi-link {
    font-size: 12px;
    color: var(--kpi-color);
    font-weight: 600;
    text-decoration: none;
    white-space: nowrap;
    transition: all .2s;
}
.adm-kpi-link:hover { opacity: .75; }

/* Dark mode for KPI cards */
html[data-theme="dark"] .adm-kpi-card {
    background: #161b22;
    border-color: #30363d;
    box-shadow: 0 2px 8px rgba(0,0,0,.4);
}
html[data-theme="dark"] .adm-kpi-card:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,.6);
}
html[data-theme="dark"] .adm-kpi-value {
    color: #e6edf3;
}
html[data-theme="dark"] .adm-kpi-label {
    color: #8b949e;
}

@media (max-width: 575.98px) {
    .adm-kpi-card {
        padding: 12px 12px;
        gap: 10px;
        border-radius: 12px;
    }
    .adm-kpi-icon {
        width: 38px;
        height: 38px;
        font-size: 16px;
        border-radius: 9px;
    }
    .adm-kpi-value {
        font-size: 20px;
        margin-bottom: 1px;
    }
    .adm-kpi-label {
        font-size: 11px;
        line-height: 1.2;
    }
    .adm-kpi-link {
        display: none;
    }
}
</style>

@endsection