@extends('layouts.admin')

@section('title', 'Projets de construction')
@section('page-title', 'Projets de construction')
@section('page-subtitle', 'Gérez les réalisations et projets affichés sur la page Construction')

@section('content')

<div class="adm-card">

    <div class="adm-card-header">
        <div>
            <h4>
                <i class="fa-solid fa-building me-2" style="color:#f97316;"></i>
                Liste des constructions
            </h4>
            <p>{{ $constructions->total() }} projet(s) enregistré(s)</p>
        </div>
        <a href="{{ route('admin.constructions.create') }}" class="adm-btn adm-btn-success">
            <i class="fa-solid fa-plus"></i> Ajouter un projet
        </a>
    </div>

    <div class="adm-card-body p-0">
        <div class="table-responsive">
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Nom du projet</th>
                        <th>Ville</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($constructions as $construction)
                    <tr>

                        <td style="font-weight:600;color:#94a3b8;">{{ $construction->id }}</td>

                        <td>
                            @if($construction->image)
                                <img src="{{ asset('storage/'.$construction->image) }}"
                                     alt="{{ $construction->title }}"
                                     style="width:64px;height:44px;object-fit:cover;border-radius:9px;">
                            @else
                                <div style="
                                    width:64px;height:44px;border-radius:9px;
                                    background:#f1f5f9;display:flex;
                                    align-items:center;justify-content:center;
                                    color:#cbd5e1;font-size:20px;">
                                    <i class="fa-solid fa-image"></i>
                                </div>
                            @endif
                        </td>

                        <td>
                            <strong style="font-size:13px;">{{ $construction->title }}</strong>
                            @if($construction->description)
                                <div style="font-size:11px;color:#94a3b8;">
                                    {{ Str::limit($construction->description, 45) }}
                                </div>
                            @endif
                        </td>

                        <td>
                            <i class="fa-solid fa-location-dot me-1" style="color:#ef4444;"></i>
                            <span style="font-size:13px;">{{ $construction->city }}</span>
                        </td>

                        <td>
                            @php
                                $statusMap = [
                                    'termine'    => ['label' => 'Terminé',    'class' => 'adm-badge-success'],
                                    'en_cours'   => ['label' => 'En cours',   'class' => 'adm-badge-warning'],
                                    'planifie'   => ['label' => 'Planifié',   'class' => 'adm-badge-info'],
                                ];
                                $s = $statusMap[$construction->status] ?? ['label' => ucfirst($construction->status), 'class' => 'adm-badge-primary'];
                            @endphp
                            <span class="adm-badge {{ $s['class'] }}">{{ $s['label'] }}</span>
                        </td>

                        <td style="font-size:12px;color:#94a3b8;white-space:nowrap;">
                            {{ $construction->created_at->format('d/m/Y') }}
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.constructions.show', $construction) }}"
                                   class="adm-btn adm-btn-outline adm-btn-icon" title="Voir">
                                    <i class="fa-solid fa-eye" style="font-size:12px;"></i>
                                </a>
                                <a href="{{ route('admin.constructions.edit', $construction) }}"
                                   class="adm-btn adm-btn-primary adm-btn-icon" title="Modifier">
                                    <i class="fa-solid fa-pen" style="font-size:12px;"></i>
                                </a>
                                <form action="{{ route('admin.constructions.destroy', $construction) }}"
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="adm-btn adm-btn-danger adm-btn-icon"
                                            onclick="return confirm('Supprimer ce projet de construction ?')"
                                            title="Supprimer">
                                        <i class="fa-solid fa-trash" style="font-size:12px;"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center" style="padding:60px 24px;">
                            <i class="fa-solid fa-building-circle-xmark fa-3x mb-3" style="color:#cbd5e1;display:block;"></i>
                            <p style="font-size:15px;font-weight:600;color:#64748b;">Aucun projet de construction</p>
                            <p style="font-size:13px;color:#94a3b8;margin-bottom:18px;">
                                Ajoutez votre premier projet pour le faire apparaître sur le site.
                            </p>
                            <a href="{{ route('admin.constructions.create') }}" class="adm-btn adm-btn-success">
                                <i class="fa-solid fa-plus"></i> Ajouter un projet
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($constructions->hasPages())
        <div style="padding:18px 24px;border-top:1px solid #f1f5f9;">
            {{ $constructions->links() }}
        </div>
        @endif
    </div>

</div>

@endsection