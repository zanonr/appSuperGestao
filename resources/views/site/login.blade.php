
@extends('site.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>

    <div class="informacao-pagina">
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            <form action={{ route('site.login' )}} method="post">
                @csrf
                <input name="usuario" value="{{ old('usuario') }}zanon@zanon.com.br" type="text" placeholder="Usuário" class="borda-preta">
                {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                <input name="senha" value="{{ old('senha') }}1234" type="password" placeholder="senha" class="borda-preta">
                {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                <button type="submit" placeholder="Usuário" class="borda-preta">Acessar</button>
        </div>
        </form>
        {{ isset($erro) && $erro != '' ? $erro : '' }}
    </div>
</div>
@endsection