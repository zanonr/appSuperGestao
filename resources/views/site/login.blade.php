
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
                <input name="usuario" value=" {{ old('usuario') }} " type="text" placeholder="Usuário" class="borda-preta"></input>
                {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                <input name="senha" value=" {{ old('senha') }} " type="password" placeholder="senha" class="borda-preta"></input>
                {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                <button type="submit" placeholder="Usuário" class="borda-preta">Acessar</button>
        </div>
        </form>
    </div>
</div>
@endsection