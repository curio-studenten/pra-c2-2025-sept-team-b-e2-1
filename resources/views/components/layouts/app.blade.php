<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
</head>
<body>

<x-navbar/>

<div class="container">
    <div>

        <div>
            <x-header/>

            <ul class="breadcrumb">
                <li><a href="/" title="{{ __('misc.home_alt') }}"
                       alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a></li>
                {{ $breadcrumb ?? '' }}
            </ul>

            @if ( isset($_GET['q']) )
                <x-search_results/>
            @else
                {{ $slot }}
            @endif
        </div>
    </div>
</div>

<ul class="breadcrumb footer">
    <li class="footerLink">
		<a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a>
	</li>
    {{ $breadcrumb ?? '' }}

    <div class="copyright">
        <x-footer/>
    </div>
</ul>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>//window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>
