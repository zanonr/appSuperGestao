@section('style')
    <!-- <link href="/css/app.css" rel="stylesheet"> -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
@show

<div class="menu-superior">
    <ul>
        <li>
            <!--<a href="/">Princial</a>-->
            <a href=" {{ route('site.index') }} ">Principal</a>
        </li>
        <li>
            <!--<a href="/sobre-nos">Sobre Nós</a>-->
            <a href=" {{ route('site.sobre-nos') }} ">Sobre Nós</a>
        </li>
        <li>
            <!--<a href="/contato">Contato</a>-->
            <a href=" {{ route('site.contato') }} ">Contato</a>
        </li>
        <li></li><li></li><li></li><li></li><li></li><li></li>
        <li>
            <!--<a href="/login">Login</a>-->
            <a href=" {{ route('site.login') }} ">Login</a>
        </li>
        <li>
            <!--<a href="/app/cliente">Cliente</a>-->
            <a href=" {{ route('app.cliente') }} ">Cliente</a>
        </li>
        <li>
            <!--<a href="/app/fornecedor">Fornecedor</a>-->
            <a href=" {{ route('app.fornecedor') }} ">Fornecedor</a>
        </li>
        <li>
            <!--<a href="/app/produto">Produto</a>-->
            <a href=" {{ route('app.produto') }} ">Produto</a>
        </li>
    </ul>
</div>