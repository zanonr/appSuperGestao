<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create(); 
        $this->call(FornecedorSeeder::class);
        
        // ******* Site Contato ************ //
        //$this->call(ContatoSeeder::class);     // assim ele usa o ContatoSeeder

        // cria a classe Factory, define e coloca aqui
        \App\Models\SiteContato::factory(100)->create(); // pra quando usar o Factory - não precisa da Classe SiteContatoSeeder.php

        $this->call(MotivoContatosSeeder::class);
    }
}
