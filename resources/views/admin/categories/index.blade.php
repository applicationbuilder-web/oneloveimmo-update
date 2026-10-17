@extends('layouts.admin')

@section('title', 'Gestion des catégories')
@section('page-title', 'Catégories')
@section('page-subtitle', 'Gérez les catégories de biens et de services')

@section('content')

{{-- Barre supérieure d'action --}}
<div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-3">
    <div>
        <span class="text-muted small">Total : <strong>{{ $categories->total() }}</strong> catégorie(s) enregistrée(s)</span>
    </div>

    <a href="{{ route('admin.categories.create') }}" class="adm-btn adm-btn-primary">
        <i class="fa-solid fa-plus"></i>
        Nouvelle catégorie
    </a>
</div>

{{-- Tableau des catégories --}}
<div class="adm-card">
    <div class="adm-card-header d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-layer-group text-primary"></i>
            <span class="fw-bold" style="color:#0d1b2a;">Toutes les catégories</span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table">
            <thead>
                <tr>
                    <th style="width:70px;">ID</th>
                    <th style="width:70px;">Icône</th>
                    <th>Nom de la catégorie</th>
                    <th>Description</th>
                    <th style="width:140px;text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td class="text-muted fw-bold">#{{ $category->id }}</td>
                        <td>
                            <div style="width:40px;height:40px;border-radius:10px;background:#eff6ff;color:var(--adm-primary);display:flex;align-items:center;justify-content:center;font-size:16px;">
                                <i class="fa-solid {{ $category->icon ?: 'fa-folder' }}"></i>
                            </div>
                        </td>
                        <td>
                            <strong style="color:#0d1b2a;font-size:14px;">{{ $category->name }}</strong>
                            @if($category->icon)
                                <div class="text-muted small mt-1">
                                    <code>{{ $category->icon }}</code>
                                </div>
                            @endif
                        </td>
                        <td style="color:#64748b;max-width:320px;">
                            {{ Str::limit($category->description, 90) ?: '-' }}
                        </td>
                        <td style="text-align:right;">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="adm-btn adm-btn-icon adm-btn-outline" title="Modifier">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="adm-btn adm-btn-icon adm-btn-danger" title="Supprimer">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="fa-solid fa-layer-group text-muted mb-2" style="font-size:36px;opacity:.3;"></i>
                            <p class="text-muted mb-0">Aucune catégorie pour le moment.</p>
                            <a href="{{ route('admin.categories.create') }}" class="adm-btn adm-btn-primary mt-3">
                                <i class="fa-solid fa-plus"></i> Créer la première catégorie
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($categories->hasPages())
        <div class="p-3 border-top">
            {{ $categories->links() }}
        </div>
    @endif
</div>

@endsection