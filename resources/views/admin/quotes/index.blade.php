@extends('layouts.admin')

@section('title', 'Demandes de devis')
@section('page-title', 'Demandes de devis')
@section('page-subtitle', 'Toutes les demandes soumises depuis la page Construction')

@section('content')

<div class="adm-card">

    <div class="adm-card-header">
        <div>
            <h4>
                <i class="fa-solid fa-file-signature me-2" style="color:#ef4444;"></i>
                Demandes de devis
            </h4>
            <p>{{ $quotes->total() }} demande(s) au total</p>
        </div>
        @php $newCount = $quotes->where('status','nouveau')->count(); @endphp
        @if($newCount > 0)
            <span class="adm-badge adm-badge-danger">
                <i class="fa-solid fa-circle-dot"></i> {{ $newCount }} nouvelle(s)
            </span>
        @endif
    </div>

    <div class="adm-card-body p-0">
        <div class="table-responsive">
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Téléphone</th>
                        <th>Type de projet</th>
                        <th>Ville</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($quotes as $quote)
                    <tr style="{{ $quote->status == 'nouveau' ? 'background:#fffbf7;' : '' }}">

                        <td style="font-weight:600;color:#94a3b8;">{{ $quote->id }}</td>

                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <div style="
                                    width:34px;height:34px;border-radius:9px;
                                    background:linear-gradient(135deg,#ef4444,#dc2626);
                                    color:#fff;display:flex;align-items:center;
                                    justify-content:center;font-weight:700;font-size:13px;
                                    flex-shrink:0;">
                                    {{ strtoupper(substr($quote->fullname, 0, 1)) }}
                                </div>
                                <strong style="font-size:13px;">{{ $quote->fullname }}</strong>
                            </div>
                        </td>

                        <td>
                            <a href="tel:{{ $quote->phone }}" style="color:#1e293b;text-decoration:none;font-size:13px;">
                                {{ $quote->phone }}
                            </a>
                        </td>

                        <td style="font-size:13px;">{{ $quote->project_type }}</td>

                        <td>
                            <i class="fa-solid fa-location-dot me-1" style="color:#ef4444;"></i>
                            <span style="font-size:13px;">{{ $quote->city }}</span>
                        </td>

                        <td>
                            @if($quote->status == 'nouveau')
                                <span class="adm-badge adm-badge-danger">
                                    <i class="fa-solid fa-circle-dot"></i> Nouveau
                                </span>
                            @elseif($quote->status == 'en_cours')
                                <span class="adm-badge adm-badge-warning">En cours</span>
                            @else
                                <span class="adm-badge adm-badge-success">
                                    <i class="fa-solid fa-check"></i> Traité
                                </span>
                            @endif
                        </td>

                        <td style="font-size:12px;color:#94a3b8;white-space:nowrap;">
                            {{ $quote->created_at->format('d/m/Y') }}
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.quotes.show', $quote) }}"
                                   class="adm-btn adm-btn-outline adm-btn-icon" title="Voir la demande">
                                    <i class="fa-solid fa-eye" style="font-size:12px;"></i>
                                </a>
                                <form action="{{ route('admin.quotes.destroy', $quote) }}"
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="adm-btn adm-btn-danger adm-btn-icon"
                                            onclick="return confirm('Supprimer cette demande de devis ?')"
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
                            <i class="fa-solid fa-file-circle-xmark fa-3x mb-3" style="color:#cbd5e1;display:block;"></i>
                            <p style="font-size:15px;font-weight:600;color:#64748b;">Aucune demande de devis</p>
                            <p style="font-size:13px;color:#94a3b8;">
                                Les nouvelles demandes apparaîtront ici automatiquement.
                            </p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($quotes->hasPages())
        <div style="padding:18px 24px;border-top:1px solid #f1f5f9;">
            {{ $quotes->links() }}
        </div>
        @endif
    </div>

</div>

@endsection