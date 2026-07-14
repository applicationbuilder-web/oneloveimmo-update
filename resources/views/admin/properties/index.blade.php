<tbody>

@forelse($properties as $property)

<tr>

    <td>

        {{ $property->id }}

    </td>

    <td>

        <img
            src="{{ asset('assets/images/properties/'.$property->image) }}"
            width="100"
            class="rounded">

    </td>

    <td>

        {{ $property->title }}

    </td>

    <td>

        {{ $property->category?->name ?? '-' }}

    </td>

    <td>

        {{ $property->city }}

    </td>

    <td>

        {{ number_format($property->price,0,',',' ') }} FCFA

    </td>

    <td>

        @if($property->status=='a_vendre')

            <span class="badge bg-success">

                À vendre

            </span>

        @else

            <span class="badge bg-warning text-dark">

                À louer

            </span>

        @endif

    </td>

    <td>

        <a
            href="{{ route('admin.properties.show',$property) }}"
            class="btn btn-info btn-sm">

            <i class="fa-solid fa-eye"></i>

        </a>

        <a
            href="{{ route('admin.properties.edit',$property) }}"
            class="btn btn-warning btn-sm">

            <i class="fa-solid fa-pen"></i>

        </a>

        <form
            action="{{ route('admin.properties.destroy',$property) }}"
            method="POST"
            class="d-inline">

            @csrf

            @method('DELETE')

            <button
                onclick="return confirm('Supprimer ce bien ?')"
                class="btn btn-danger btn-sm">

                <i class="fa-solid fa-trash"></i>

            </button>

        </form>

    </td>

</tr>

@empty

<tr>

    <td colspan="8" class="text-center">

        Aucun bien enregistré.

    </td>

</tr>

@endforelse

<div class="mt-4">

    {{ $properties->links() }}

</div>

</tbody>