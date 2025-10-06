<!DOCTYPE html>
<html lang="en">
<head>
    <x-head/>
</head>
<body>

<x-navbar/>

<div class="container mid-container">
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
    <div class="topFooter">
        <li class="footerLink">
            <a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}" class="crumbLink">{{ __('misc.home') }}</a>
        </li>
        {{ $breadcrumb ?? '' }}

        <div class="copyright">
            <x-footer/>
        </div>
    </div>

    <div class="bottomFooter">
            <ul class="footerBottomList">
                <li class="bold">Over ons</li>
                <li>Lorem ipsum bla bla</li>
            </ul>
        <ul class="footerBottomList">
                <li class="bold">Contact gegevens</li>
                <li><a class="footerContact" href="{{ route('contact') }}">Contact opnemen</a></li>
                <li>ipsum</li>
            </ul>
            <ul class="footerBottomList">
                <li class="bold">Social links</li>
                <li>lorem</li>
                <li>ipsum</li>
            </ul>
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
