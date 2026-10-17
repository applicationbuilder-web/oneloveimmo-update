@extends('layouts.admin')

@section('title', 'Gestion des biens')
@section('page-title', 'Biens immobiliers')
@section('page-subtitle', 'Gérez l\'ensemble des biens disponibles sur OneLove Immo')

@section('content')

<div class="adm-card">

    <div class="adm-card-header">
        <div>
            <h4>
                <i class="fa-solid fa-house-chimney me-2" style="color:#1478ff;"></i>
                Liste des biens
            </h4>
            <p>{{ $properties->total() }} bien(s) enregistré(s)</p>
        </div>
        <a href="{{ route('admin.properties.create') }}" class="adm-btn adm-btn-primary">
            <i class="fa-solid fa-plus"></i> Ajouter un bien
        </a>
    </div>

    <div class="adm-card-body p-0">
        <div class="table-responsive">
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th>Ville</th>
                        <th>Prix</th>
                        <th>Statut</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($properties as $property)
                    <tr>

                        <td style="font-weight:600;color:#94a3b8;">{{ $property->id }}</td>

                        <td>
                            @php
                                $image = $property->image
                                    ? asset('storage/'.$property->image)
                                    : asset('assets/images/no-image.jpg');
                            @endphp
                            <img src="{{ $image }}" alt="{{ $property->title }}"
                                 style="width:64px;height:44px;object-fit:cover;border-radius:9px;">
                        </td>

                        <td>
                            <strong style="font-size:13px;">{{ Str::limit($property->title, 35) }}</strong>
                            @if($property->featured)
                                <br>
                                <span class="adm-badge adm-badge-primary mt-1">
                                    <i class="fa-solid fa-star"></i> Vedette
                                </span>
                            @endif
                        </td>

                        <td>
                            @if($property->category)
                                <span class="adm-badge adm-badge-info">{{ $property->category->name }}</span>
                            @else
                                <span style="color:#cbd5e1;font-size:13px;">—</span>
                            @endif
                        </td>

                        <td>
                            <i class="fa-solid fa-location-dot me-1" style="color:#ef4444;"></i>
                            <span style="font-size:13px;">{{ $property->city }}</span>
                        </td>

                        <td style="font-size:13px;font-weight:600;white-space:nowrap;">
                            {{ number_format($property->price, 0, ',', ' ') }}
                            <span style="font-size:11px;color:#94a3b8;font-weight:400;">FCFA</span>
                        </td>

                        <td>
                            @if($property->status == 'a_vendre')
                                <span class="adm-badge adm-badge-success">À vendre</span>
                            @else
                                <span class="adm-badge adm-badge-warning">À louer</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.properties.show', $property) }}"
                                   class="adm-btn adm-btn-outline adm-btn-icon" title="Voir">
                                    <i class="fa-solid fa-eye" style="font-size:12px;"></i>
                                </a>
                                <a href="{{ route('admin.properties.edit', $property) }}"
                                   class="adm-btn adm-btn-primary adm-btn-icon" title="Modifier">
                                    <i class="fa-solid fa-pen" style="font-size:12px;"></i>
                                </a>
                                <form action="{{ route('admin.properties.destroy', $property) }}"
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="adm-btn adm-btn-danger adm-btn-icon"
                                            onclick="return confirm('Voulez-vous vraiment supprimer ce bien ?')"
                                            title="Supprimer">
                                        <i class="fa-solid fa-trash" style="font-size:12px;"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center" style="padding:60px 24px;">
                            <i class="fa-solid fa-house-circle-xmark fa-3x mb-3" style="color:#cbd5e1;display:block;"></i>
                            <p style="font-size:15px;font-weight:600;color:#64748b;">Aucun bien immobilier</p>
                            <p style="font-size:13px;color:#94a3b8;margin-bottom:18px;">
                                Commencez par ajouter votre premier bien.
                            </p>
                            <a href="{{ route('admin.properties.create') }}" class="adm-btn adm-btn-primary">
                                <i class="fa-solid fa-plus"></i> Ajouter un bien
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($properties->hasPages())
        <div style="padding:18px 24px;border-top:1px solid #f1f5f9;">
            {{ $properties->links() }}
        </div>
        @endif
    </div>

</div>

@endsection