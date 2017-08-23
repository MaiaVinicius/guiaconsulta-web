<!DOCTYPE html>
<html lang="en">
<head>
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/css/app.css">

    <link rel="shortcut icon" href="guiaconsulta-36x36.png">
    <title>Guia Consulta</title>
</head>
<body>
<div id="app">
    <router-view></router-view>
</div>
<script src="/js/app.js"></script>
</body>
</html>