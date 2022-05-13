<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Usuario extends Entity
{
    protected $datamap = [];
    protected $dates   = [
        'criado_em',
        'atualizado_em',
        'deletado_em',
    ];
    protected $casts = [];

    public function verificaPassword(string $password)
    {
        return password_verify($password, $this->password_hash);
    }
}
