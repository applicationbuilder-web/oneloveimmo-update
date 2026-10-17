@extends('layouts.admin')

@section('title', 'Messages de contact')
@section('page-title', 'Messages de contact')
@section('page-subtitle', 'Tous les messages reçus via le formulaire de contact')

@section('content')

<div class="adm-card">

    <div class="adm-card-header">
        <div>
            <h4>
                <i class="fa-solid fa-envelope me-2" style="color:#0ea5e9;"></i>
                Messages reçus
            </h4>
            <p>{{ $contacts->total() }} message(s) au total</p>
        </div>
        @php $unread = $contacts->where('is_read', false)->count(); @endphp
        @if($unread > 0)
            <span class="adm-badge adm-badge-warning">
                <i class="fa-solid fa-circle-dot"></i> {{ $unread }} non lu(s)
            </span>
        @endif
    </div>

    <div class="adm-card-body p-0">
        <div class="table-responsive">
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Expéditeur</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Sujet</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr style="{{ !$contact->is_read ? 'background:#fffbf7;' : '' }}">

                        <td style="font-weight:600;color:#94a3b8;">{{ $contact->id }}</td>

                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <div style="
                                    width:34px;height:34px;border-radius:9px;
                                    background:linear-gradient(135deg,#0ea5e9,#0284c7);
                                    color:#fff;display:flex;align-items:center;
                                    justify-content:center;font-weight:700;font-size:13px;
                                    flex-shrink:0;">
                                    {{ strtoupper(substr($contact->name,0,1)) }}
                                </div>
                                <span style="font-weight:600;font-size:13px;">{{ $contact->name }}</span>
                            </div>
                        </td>

                        <td style="font-size:13px;">
                            <a href="mailto:{{ $contact->email }}" style="color:#1e293b;text-decoration:none;">
                                {{ $contact->email }}
                            </a>
                        </td>

                        <td style="font-size:13px;">{{ $contact->phone ?? '—' }}</td>

                        <td style="font-size:13px;">{{ Str::limit($contact->subject, 35) }}</td>

                        <td>
                            @if($contact->is_read)
                                <span class="adm-badge adm-badge-success">
                                    <i class="fa-solid fa-check"></i> Lu
                                </span>
                            @else
                                <span class="adm-badge adm-badge-warning">
                                    <i class="fa-solid fa-circle-dot"></i> Non lu
                                </span>
                            @endif
                        </td>

                        <td style="font-size:12px;color:#94a3b8;white-space:nowrap;">
                            {{ $contact->created_at->format('d/m/Y') }}
                        </td>

                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.contacts.show', $contact) }}"
                                   class="adm-btn adm-btn-outline adm-btn-icon" title="Voir le message">
                                    <i class="fa-solid fa-eye" style="font-size:12px;"></i>
                                </a>
                                <form action="{{ route('admin.contacts.destroy', $contact) }}"
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="adm-btn adm-btn-danger adm-btn-icon"
                                            onclick="return confirm('Supprimer ce message ?')"
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
                            <i class="fa-solid fa-envelope-open fa-3x mb-3" style="color:#cbd5e1;display:block;"></i>
                            <p style="font-size:15px;font-weight:600;color:#64748b;">Aucun message reçu</p>
                            <p style="font-size:13px;color:#94a3b8;">Les messages du formulaire de contact apparaîtront ici.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($contacts->hasPages())
        <div style="padding:18px 24px;border-top:1px solid #f1f5f9;">
            {{ $contacts->links() }}
        </div>
        @endif
    </div>

</div>

@endsection