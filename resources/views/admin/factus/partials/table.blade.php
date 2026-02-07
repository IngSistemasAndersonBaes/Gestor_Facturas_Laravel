<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Fecha</th>
            <th scope="col" class="px-6 py-3">No Factura</th>
            <th scope="col" class="px-6 py-3" width="10px">Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($factus as $factu)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$factu->id}}
                </th>
                <td class="px-6 py-4">{{ $factu->fecha->format('Y-m-d') }}</td>
                <td class="px-6 py-4">{{ str_pad($factu->No_Factura, 5, '0', STR_PAD_LEFT) }}</td>
                <td class="px-6 py-4">
                    <div class="flex space-x-2">
                        <a href="{{route('admin.factus.edit', $factu)}}" class="btn btn-blue text-xs">Editar</a>
                        <form class="delete-form" action="{{route('admin.factus.destroy', $factu)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-red text-xs">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
