<?php

namespace Database\Seeders;

use App\Models\MotivoContato;
use Illuminate\Database\Seeder;

class MotivoContatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MotivoContato::create([ 'motivo_contato' => 'Dúvida' ]);
        MotivoContato::create([ 'motivo_contato' => 'Elogio' ]);  
        MotivoContato::create([ 'motivo_contato' => 'Reclamação' ]);

    }
}
