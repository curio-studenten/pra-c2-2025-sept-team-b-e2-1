<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    <div class="grid-container">
    @foreach ($manuals as $manual)
        @if ($manual->locally_available)
            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/"
               class="grid-container-items"
               title="{{ $manual->name }}">
                <div>
                    <h3>{{ $manual->name }}</h3>
                    <p>({{ $manual->filesize_human_readable }})</p>
                </div>
            </a>
        @else
            <a href="{{ $manual->url }}"
               target="_blank"
               class="grid-container-items"
               title="{{ $manual->name }}">
                <div>
                    <h3>{{ $manual->name }}</h3>
                </div>
            </a>
        @endif
    @endforeach
</div>


</x-layouts.app>
