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
    <link rel="stylesheet" href="/css/app.css">


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

    <title>Guia Consulta</title>

    <script src="/js/field-validator.js"></script>

</head>
<body>
<div id="app">
    <router-view></router-view>
</div>
<script src="/js/app.js"></script>
<script src="/js/jquery.mask.min.js"></script>
<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('./service-worker.js')
            .then(function () {
                console.log('Service Worker Registered');
            });
    }

    const FieldValidatorX = new FieldValidator();
</script>
</body>
</html>