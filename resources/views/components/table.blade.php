<div class="relative overflow-x-auto shadow shadow-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                @foreach ($tableData['heading'] as $heading)
                    <th scope="col" class="px-6 py-3">
                        {{$heading}}
                    </th>
                @endforeach
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData['data'] as $data)
                <!-- Alternating row colors between white and light blue -->
                <tr class="{{ $loop->even ? 'bg-white' : 'bg-blue-50' }} border-b">
                    @foreach (array_keys($tableData['heading']) as $field)
                        <!-- First column as <th>, others as <td> -->
                        @if ($loop->first)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$data->$field}}
                            </th>
                        @else
                            <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                @if($field === 'category_id')
                                    {{$data->category->name}}
                                @else
                                    {{$data->$field}}
                                @endif
                            </td>
                        @endif
                    @endforeach
                    <td>
                        <div class="flex items">
                            <a href="{{$attributes->get('actionRoute').'/'.$data->id.'/edit'}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{$attributes->get('actionRoute').'/'.$data->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    <div class="p-2 bg-gray-50">
        {{$tableData['data']->links()}}
    </div>
</div>