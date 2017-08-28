<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>--}}

    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="theme-color" content="#2d9cd7"/>

    <link rel="shortcut icon" href="guiaconsulta-36x36.png">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">


    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ URL::asset('css/wizard.css') }}">

    <title>Guia Consulta</title>

    <script src="/js/field-validator.js"></script>

</head>
<body>
<div id="app">
    <router-view></router-view>
</div>
<script src="{{ URL::asset('/js/app.js') }}"></script>
<script src="{{ URL::asset('/js/jquery.mask.min.js') }}"></script>
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('{{ URL::asset('service-worker.js') }}')
            .then(function () {
                console.log('Service Worker Registered');
            });
    }

    const FieldValidatorX = new FieldValidator();
</script>
</body>
</html>