<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $returnType = 'App\Entities\Usuario';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['nome', 'email', 'telefone'];
    protected $useTimestamps = true;
    protected $createdField = 'criado_em';
    protected $updatedField = 'atualizado_em';
    protected $deletedField = 'deletado_em';

    protected $validationRules = [
        'nome' => 'required|min_length[4]|max_length[120]',
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'cpf' => 'required|exact_length[14]|is_unique[usuarios.cpf]',
        'password' => 'required|min_length[6]',
        'password_confirmation' => 'required_with[password]|matches[password]',
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'Este campo é obrigatório.',
            'min_length' => 'O tamaho mínimo é de 4 caracteres.',
            'max_length' => 'O tamaho máximo é de 120 caracteres.',
        ],
        'email' => [
            'required' => 'Este campo é obrigatório.',
            'is_unique' => 'Este e-mail já existe.',
        ],
        'cpf' => [
            'required' => 'Este campo é obrigatório.',
            'is_unique' => 'Este CPF já existe.',
        ],
    ];

    public function procurar($term)
    {
        if ($term == null) {
            return [];
        }

        return $this->select('id, nome')
            ->like('nome', $term)
            ->get()
            ->getResult();
    }
}
