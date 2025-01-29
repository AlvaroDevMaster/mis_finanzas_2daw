<div class="relative overflow-x-auto shadow shadow-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                @foreach ($tableData['heading'] as $heading)
                    <th scope="col" class="px-6 py-3">
                        {{$heading}}
                    </th>    
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData['data'] as $index => $row)
                <!-- Alternating row colors between white and light blue -->
                <tr class="{{ $loop->even ? 'bg-white' : 'bg-blue-50' }} border-b">
                    @foreach ($row as $key => $cell)
                        <!-- First column as <th> and others as <td> -->
                        @if ($loop->first)
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$cell}}
                            </th>
                        @else
                            <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                {{$cell}}
                            </td>
                        @endif
                    @endforeach
                </tr>    
            @endforeach
        </tbody>
    </table>
</div>