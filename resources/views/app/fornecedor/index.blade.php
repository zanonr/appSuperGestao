@extends('site.layouts.basico')

@section('titulo', $titulo )

@section('conteudo')
<br><br><br><br><br><br><br><br><br>
<h3>FORNECEDOR INDEX</h3>

{{-- // comentario descartado pelo interpretador blade--}} 


@php
    //if(isset($variavel)) {} // retorna se a variavel estiver definida -- apenas se existe ou nao
    //if(empty($variavel)) // retorna true se a variável estiver vazia : '', 0, 0.0,'0',null',false,array(),$var = 'xyz'

@endphp
{{-- IF executa se o retorno for TRUE
@dd($fornecedores) --}}  {{-- imprimindo o array --}}

{{--  MODO COM IF
@if(count($fornecedores)>0 && count($fornecedores) < 10)
    <h3>Existem menos de 10 fornecedores cadastrados </h3>
@elseif(count($fornecedores)>10)
    <h3>Existem mais de 10 fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif
--}}

{{-- @dd($fornecedoresMulti) --}}

@isset($fornecedoresMulti)
    @for( $i = 0 ; isset($fornecedoresMulti[$i]); $i++ )
        {{-- MODO COM UNLESS --}}
        Fornecedor: {{$fornecedoresMulti[$i]['nome']}}
        <br>
        Status: {{$fornecedoresMulti[$i]['status']}}
        <br>
        {{-- se a variavel testada nao estiver definida OU possuir valor null --}} 
        CNPJ: {{$fornecedoresMulti[$i]['cnpj'] ?? 'Dado não preenchido' }}
        <br>
        Telefone: {{$fornecedoresMulti[$i]['ddd'] ?? ''}} {{$fornecedoresMulti[$i]['telefone'] ?? '' }}
        @switch($fornecedoresMulti[$i]['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('32')
                Juiz de Fora - MG
                @break
            @case('85')
                Fortaleza - CE
                @break
            @default
                Estado não informado
        @endswitch
        <hr>
    @endfor


    Teste de While <br>
    @php $i = 0 @endphp
    @while( isset($fornecedoresMulti[$i]) )
        Fornecedor: {{ $fornecedoresMulti[$i]['nome'] }}
        <hr>
        @php $i++ @endphp
    @endwhile

    @foreach ( $fornecedoresMulti as $indice => $fornecedor )
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
    @endforeach
 <br>
    @forelse ( $fornecedoresMulti as $indice => $fornecedor )
        indice: {{ $loop -> iteration }} <br>
        @if( $loop-> first )
            Primeira Iteracao<br>
        @endif
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        @if( $loop->last )
            Foram impressos {{ $loop-> count }} registros
        <br>
        @endif
    @empty
        Não existem fornecedores Cadastrados!!
    @endforelse

    {{-- 
    @unless($fornecedoresMulti[0]['status']=='S')
        Fornecedor Inativo
    @endif
    <br>
    @isset($fornecedoresMulti[0]['cnpj'])
        CNPJ: {{ $fornecedoresMulti[0]['cnpj']}}
    @endisset
--}}
@endisset

<br><br><br><br><br>
@for($ii = 0; $ii < 10; $ii++)
    {{ $ii }} <br>
@endfor





<br><br>
@empty($fornecedoresMulti[2]['cnpj'])
    {{$fornecedoresMulti[2]['nome']}} Cnpj esta vazio
@endempty

{{-- condições ternárias --}}


<br><br><br><br><br><br><br><br><br>
@endsection