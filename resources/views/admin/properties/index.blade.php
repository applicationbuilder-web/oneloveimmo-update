<tbody>

    @forelse($properties as $property)

        <tr>

            <td>
                {{ $property->id }}
            </td>

            <td>

                @php
                    $image = $property->image
                        ? (str_contains($property->image, '/')
                            ? asset('storage/' . $property->image)
                            : asset('assets/images/properties/' . $property->image))
                        : asset('assets/images/no-image.jpg');
                @endphp

                <img
                    src="{{ $image }}"
                    alt="{{ $property->title }}"
                    width="100"
                    height="80"
                    class="rounded"
                    style="object-fit: cover;">

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
                {{ number_format($property->price, 0, ',', ' ') }} FCFA
            </td>

            <td>

                @if($property->status == 'a_vendre')

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
                    href="{{ route('admin.properties.show', $property) }}"
                    class="btn btn-info btn-sm">

                    <i class="fa-solid fa-eye"></i>

                </a>

                <a
                    href="{{ route('admin.properties.edit', $property) }}"
                    class="btn btn-warning btn-sm">

                    <i class="fa-solid fa-pen"></i>

                </a>

                <form
                    action="{{ route('admin.properties.destroy', $property) }}"
                    method="POST"
                    class="d-inline">

                    @csrf

                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Supprimer ce bien ?')">

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

</tbody>

</table>

<div class="mt-4">

    {{ $properties->links() }}

</div>