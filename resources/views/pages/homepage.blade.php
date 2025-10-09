<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <?php
        $get = request()->query('v');
        $get = is_string($get) ? strtolower($get) : null;

        $filtered = $brands;
        if ($get) {
            $filtered = $brands->filter(fn($b) => strtolower(substr($b->name, 0, 1)) === $get)->values();
        }

        $size = count($filtered);
        $columns = 3;
        $chunk_size = ceil($size / $columns);
    ?>

    <div class="container">
        <?php
            $initials = $brands->map(function ($b) {
                return strtoupper(substr($b->name, 0, 1));
            })->unique()->sort()->values();
                
            $letters = collect(range('A', 'Z'));
        ?>

        <nav class="mb-3">
            @foreach ($letters as $L)
                <?php
                    $enabled = $initials->contains($L);
                    $active = isset($get) && strtoupper($get) === $L;
                    $url = request()->fullUrlWithQuery(['v' => strtolower($L)]);
                ?>

                @if ($enabled)
                    @if ($active)
                        <strong>{{ $L }}</strong>
                    @else
                        <a href="{{ $url }}">{{ $L }}</a>
                    @endif
                    @else
                        <span class="text-muted">{{ $L }}</span>
                    @endif

                    @if (!$loop->last)
                        <span> - </span>
                    @endif
            @endforeach
        </nav>

        <?php
            $grouped = $filtered->groupBy(function ($b) {
                return strtoupper(substr($b->name, 0, 1));
                });

            $columns = 3;
            $chunks = $grouped->chunk(ceil($grouped->count() / $columns));    
            ?>

        <div class="row">
            @if ($get)
                <div class="col-md-12" style="background-color:#f5f5f5;">
                    <div class="p-3">
                        <h2>{{ strtoupper($get) }}</h2>
                        <ul class="mb-0">
                            @foreach ($filtered as $brand)
                                <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                @foreach ($chunks as $groupChunk)
                    <div class="col-md-4">
                        <div class="p-3">
                            @foreach ($groupChunk as $letter => $brandsForLetter)
                                <h2>{{ $letter }}</h2>
                                <ul>
                                    @foreach ($brandsForLetter as $brand)
                                        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a></li>
                                    @endforeach
                                </ul>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
    </div>
</x-layouts.app>