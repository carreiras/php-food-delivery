<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $usuarioModel = new \App\Models\UsuarioModel;

        $usuario = [
            'nome' => "Administrador",
            'email' => "admin@admin.com",
            'cpf' => "137.447.190-90",
            'telefone' => "(99) 99999-9999"
        ];

        $usuarioModel->protect(false)->insert($usuario);

        $usuario = [
            'nome' => "Fulano",
            'email' => "fulano@email.com",
            'cpf' => "925.010.390-50",
            'telefone' => "(88) 88888-8888"
        ];

        $usuarioModel->protect(false)->insert($usuario);

        dd($usuarioModel->errors());
    }
}
