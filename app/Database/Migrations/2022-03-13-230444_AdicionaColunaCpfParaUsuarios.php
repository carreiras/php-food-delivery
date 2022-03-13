<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdicionaColunaCpfParaUsuarios extends Migration
{
    public function up()
    {
        $fields = [
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ]
        ];
        $this->forge->addColumn('usuarios', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('usuarios', 'cpf');
    }
}
