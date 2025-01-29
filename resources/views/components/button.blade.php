@if ($attributes->has('href'))
    <a {{ $attributes->merge(['class' => 'px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none']) }}
        {{ $attributes->except('class') }}>
        {{ $slot }}
    </a>
@elseif ($attributes->has('name'))
<input type="submit"
        {{ $attributes->merge(['class' => 'px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none']) }}
        {{ $attributes->except('class') }}
        value="{{ $slot }}" />
@else
   <button type="button" {{ $attributes->merge(['class' => 'px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none']) }}
        {{ $attributes->except('class') }}>{{$slot}}</button> 
@endif