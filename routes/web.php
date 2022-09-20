<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TesteController;
use App\Http\Middleware\LogAcessoMiddlware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/sobre-nos', function () {
    return "sobre nós";
});
Route::get('/contato', function () {
    return "contato";
});

*/

// Rotas Autenticadas
Route::middleware('autenticacao:padrao,visitante')
        ->prefix('/app')->group((function() {
    Route::get('/clientes', [ClienteController::class, 'cliente'])->name('app.clientes'); //nomear a rota para não ter dependência direta
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', [ProdutoController::class, 'produto'])->name('app.produtos');
}));

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('site.teste'); // Controller passando parâmetros

## Rota de Fallback - não exibir o Not Found para o usuário
Route::fallback( function(){
    echo 'A rota acessada não existe. <a href=" '.route('site.index').' ">Click aqui</a> para ir à página inicial.';
});

// rotas Publicas
Route::get('/', [PrincipalController::class, 'principal'])
    ->name('site.index');
    
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
// rota padrão -- abaixo alguns exemplos de utilização de rota
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

/*
// parâmetros Obrigatórios
// rota com parâmetros direto retornando conteúdo direto
// parâmetros opcionais devem conter o ? no final do nome do parâmetro {mensagem?}
// permite definir um valor padrão para quando a parâmetro não for informado
// ex: http://localhost:8000/contato/nome/categoria/assunto
// ex: http://localhost:8000/contato/nome/categoria/assunto/estou%20com%20duvida
// valores opcionais devem ser sequenciados da direita para esquerda
// ex: http://localhost:8000/contato/nome/categoria/

Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', 
            function (string $nome = 'Nome não Informado', 
                      string $categoria = 'Categoria não informada', 
                      string $assunto = 'Assunto não informado', 
                      string $mensagem = "Mensagem não Informada") {
    echo 'Estamos aqui com parametro: '.$nome.' - '.$categoria.' - '.$assunto.' - '.$mensagem;
});
*/

#### maior segurança na Rota ####
/*
// usando expressões regulares para validar os parâmetros das rotas
// a rota só será processada se atendem as definições da rota
// se nao respeitar as definições da Rota, retorna "Not Found"
Route::get('/contato/{nome}/{categoria_id}', 
            function (string $nome = 'Nome não Informado', // caso nada seja informado
                      int $categoria_id = 1 // caso nada seja informado -- 1 = Informação
            ) {
    echo 'Estamos aqui com parametro: '.$nome.' - '.$categoria_id;
})->where('categoria_id', '[0-9]+') // expressao - precisa ser numero 0 a 9 e que tem ter pelo menos 1(+) informado 
  ->where('nome','[A-Za-z]+'); // necessário passar String de A-Z como nome 
*/


// Redirecionar Rotas -- testes
Route::get('/rota1', function(){echo "rota1";})->name('site.rota1'); // rota original
#Route::get('/rota2', function(){echo "rota2";})->name('site.rota2'); // rota2 original

# método 1 - abaixo - Redirecionando direto
# Route::redirect('/rota2','/rota1')  // redirecinamento 1
# método 2 - abaixo - dentro do controller
Route::get('/rota2', function(){ 
    return redirect()->route('site.rota1');})->name('site.rota2'); // redirecionamento 2