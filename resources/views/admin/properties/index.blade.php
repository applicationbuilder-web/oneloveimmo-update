<tbody>

@forelse($properties as $property)

<tr>

    <td>

        {{ $property->id }}

    </td>


    <td>

        @php

            $image = $property->image
                ? asset('storage/'.$property->image)
                : asset('assets/images/no-image.jpg');

        @endphp


        <img
            src="{{ $image }}"
            alt="{{ $property->title }}"
            width="100"
            height="80"
            class="rounded shadow-sm"
            style="object-fit:cover;">


    </td>


    <td>

        <strong>

            {{ $property->title }}

        </strong>


        @if($property->featured)

            <br>

            <span class="badge bg-primary mt-1">

                ⭐ Vedette

            </span>

        @endif


    </td>


    <td>

        @if($property->category)

            <span class="badge bg-secondary">

                {{ $property->category->name }}

            </span>

        @else

            -

        @endif


    </td>


    <td>

        <i class="fa-solid fa-location-dot text-danger"></i>

        {{ $property->city }}


    </td>


    <td>

        <strong>

            {{ number_format($property->price,0,',',' ') }}

        </strong>

        FCFA


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


        <div class="d-flex gap-1">


            <a
                href="{{ route('admin.properties.show',$property) }}"
                class="btn btn-info btn-sm"
                title="Voir">


                <i class="fa-solid fa-eye"></i>


            </a>



            <a
                href="{{ route('admin.properties.edit',$property) }}"
                class="btn btn-warning btn-sm"
                title="Modifier">


                <i class="fa-solid fa-pen"></i>


            </a>



            <form
                action="{{ route('admin.properties.destroy',$property) }}"
                method="POST">


                @csrf

                @method('DELETE')


                <button
                    type="submit"
                    class="btn btn-danger btn-sm"
                    title="Supprimer"
                    onclick="return confirm('Voulez-vous supprimer ce bien ?')">


                    <i class="fa-solid fa-trash"></i>


                </button>


            </form>


        </div>


    </td>


</tr>


@empty


<tr>

    <td colspan="8" class="text-center py-4">


        <i class="fa-solid fa-house-circle-xmark fa-2x mb-2"></i>


        <p class="mb-0">

            Aucun bien enregistré.

        </p>


    </td>

</tr>


@endforelse


</tbody>

</table>

<div class="mt-4">

    {{ $properties->links() }}

</div>