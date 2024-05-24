<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="3jV7FdKgwAzpJzrKzKJHQ0MoT062gsR3lPP6phSl" />
    {{-- Custom Style --}}
    @include('frontend.layout.meta')


    {{-- Title Tags --}}
    <title>@yield('title') | DOWHF Tech Solutions</title>

    {{-- Custom Style --}}
    @yield('customStyle')

</head>

<body data-new-gr-c-s-check-loaded="14.1172.0" data-gr-ext-installed="" cz-shortcut-listen="true">
    
    @if (View::hasSection('indexHeader'))
        @yield('indexHeader')
    @else
        @include('frontend.layout.header')
    @endif
    {{-- feedback Side Buttons --}}
    @include('frontend.layout.feedback')

    {{-- Main Content --}}
    @yield('MainContent')

    <!-- Footer -->
    @include('frontend.layout.footer')

    <!--Scripts -->
    @yield('scripts')

</body>

</html>
