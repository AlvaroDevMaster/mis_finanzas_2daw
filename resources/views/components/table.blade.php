<div class="relative overflow-x-auto ring-2 rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-300">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
            <tr>
                @foreach ($tableData['heading'] as $heading)
                    <th scope="col" class="px-6 py-3">
                        {{$heading}}
                    </th>
                @endforeach
                @if($attributes->get('actionRoute'))
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData['data'] as $data)
                <!-- Alternating row colors -->
                <tr class="{{ $loop->even ? 'bg-white dark:bg-gray-800' : 'bg-blue-50 dark:bg-gray-700' }} border-b dark:border-gray-600">
                    @foreach (array_keys($tableData['heading']) as $field)
                        <!-- First column as <th>, others as <td> -->
                        @if ($loop->first)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{$data->$field}}
                            </th>
                        @else
                            <td class="px-6 py-4 text-gray-900 dark:text-gray-300 whitespace-nowrap">
                                @if($field === 'category_id')
                                    {{$data->category->name}}
                                @elseif($field === 'show')
                                    <a class="px-4 py-2 text-white bg-indigo-600 rounded-md shadow-md hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-400 transition" href="{{$data->show}}">Show</a>
                                @else
                                    {{$data->$field}}
                                @endif
                            </td>
                        @endif
                    @endforeach
                    <td>
                        <div class="flex items-center gap-4">
                            <!-- Edit Button -->
                            <a href="{{$attributes->get('actionRoute') . '/' . $data->id . '/edit'}}"
                                class="px-4 py-2 text-white bg-indigo-600 rounded-md shadow-md hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-400 transition">
                                Edit
                            </a>

                            <!-- Delete Form -->
                            <form action="{{$attributes->get('actionRoute') . '/' . $data->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-4 py-2 text-white bg-red-600 rounded-md shadow-md hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-400 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    @if(!is_array($tableData['data']))
    <div class="p-2 bg-gray-50 dark:bg-gray-900 rounded-b-lg">
        {{$tableData['data']->links()}}
    </div>
    @endif
</div>
