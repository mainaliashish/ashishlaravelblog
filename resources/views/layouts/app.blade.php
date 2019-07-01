<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
    <div id="app">
        @include('layouts.top-navigation')
        <br />
        <div class="container">
            <div class="row">
                @if(Auth::check())
                @include('layouts.navigation')
                @endif
                <div class="col-lg-8">
                    @include('partials.messages')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

@include('layouts.footer')

@section('footerSection')
    @show
</html>
