<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        /*
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
        */

        $motivo_contatos = MotivoContato::all();



        ########### AULA 120 ##############
        /**** forma 1  *****/
    /* 
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        // print_r( $contato->getAttributes() );
        $contato->save();
    */
        /**** forma 2  *****/
    /*
        $contato = new SiteContato();
        $contato->fill($request->all()); // preenche os atributos do objeto com um array associativo -> precisa implementar o fillable no model

        print_r($contato->getAttributes());

        // $contato->save(); // salva no BD --- ou
        $contato->create($request->all());  // cria um objeto com um array associativo
    */
        /*
        // gerando um retorno de dentro do controller
        //echo 'Contato from Controller';

        //var_dump($_POST);
        //dd($request->all());
        echo '<pre>';
        print_r($request->all());
        echo '<pre>';
        echo $request->input('nome');
        // retornando a View responsável
        
        */
        return view('site.contato',['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        //dd($request->all());
        
        $regras = [            // usa os nomes dos inputs
            // | é usado para separar as validacoes
            'nome' => 'required|min:3|max:40|unique:site_contatos', // minimo de 3 caracteres
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'];
        $feedback = [            'nome.required' => 'o campo Nome precisa ser informado.',
        'nome.min' => 'Minimo de 3 caracteres',
        'nome.max' => 'Máximo de 40 caracteres',
        'nome.unique' => 'Nome deve ser unico no BD',
        'telefone.required' => 'Telefone precisa ser informado',

        'email.email' => 'Não é um email válido.',

        'required' => 'o campo :attribute precisa ser informado',
        'mensagem.max' => 'a mensagem deve ter no máixmo 200 caracteres'
];

        // validando os dados
        // quando o validate não é atendida, volta automaticamente para a rota acessada anteriormente, trazendo a variavel $errors preenchida
        $request->validate($regras,$feedback);

        SiteContato::create($request->all()); // salvando sem a necessidade de instanciar o objeto
        return redirect()->route('site.index');
    }
}
