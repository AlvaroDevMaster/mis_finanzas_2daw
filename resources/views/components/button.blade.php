@if ($attributes->has('href'))
    <a {{ $attributes }}
        class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none">
        {{ $slot }}
    </a>
@elseif ($attributes->has('name'))
<input type="submit"
        {{ $attributes }}
        class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none">
        {{ $slot }}
</input>
@else
   <button {{ $attributes }} type="button" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none">{{$slot}}</button> 
@endif
