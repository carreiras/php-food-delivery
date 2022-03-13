<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdicionaColunaAtivoParaUsuarios extends Migration
{
    public function up()
    {
        $fields = [
            'ativo' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false
            ]
        ];
        $this->forge->addColumn('usuarios', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', 'ativo');
    }
}
