<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Sistema Super Gestão - @yield('titulo')</title>
        <meta charset="utf-8">

        @section('style')
            <!-- <link href="/css/app.css" rel="stylesheet"> -->
            <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
        @show
    </head>

    <body>
        @include('app.layouts._partials.topo')
        @yield('conteudo')
        @include('site.layouts.rodape')
    </body>
</html>
