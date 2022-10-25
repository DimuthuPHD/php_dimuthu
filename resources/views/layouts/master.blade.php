<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Sales Representative Management</title>
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('jquery/css/jquery.modal.min.css') }}">
        <style>
            .error {
                color: red;
            }
            .modal a.close-modal {
                top: -3px;
                right: -2px;
            }
            .model{
                height: auto;
            }
        </style>
    </head>
    <body>
        <header>
            @if(session('error'))
                <div class="alert alert-danger" role="alert">{{ session('error') }} </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }} </div>
            @endif
        </header>
        @yield('content')
    </body>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('jquery/js/jquery.modal.min.js') }}"></script>
    @stack('scripts')
</html>
