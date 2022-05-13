<?php

namespace App\Models;

use CodeIgniter\Database\Exceptions\DataException;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table         = 'usuarios';
    protected $returnType    = 'App\Entities\Usuario';
    protected $allowedFields = ['nome', 'email', 'telefone'];

    // Datas
    protected $useTimestamps  = true;
    protected $createdField   = 'criado_em';
    protected $updatedField   = 'atualizado_em';
    protected $dateFormat     = 'datetime'; // Para uso com o $useSoftDeletes
    protected $useSoftDeletes = true;
    protected $deletedField   = 'deletado_em';

    // Validações
    protected $validationRules = [
        'nome'                  => 'required|min_length[4]|max_length[120]',
        'email'                 => 'required|valid_email|is_unique[usuarios.email]',
        'cpf'                   => 'required|exact_length[14]|validaCpf|is_unique[usuarios.cpf]',
        'password'              => 'required|min_length[6]',
        'password_confirmation' => 'required_with[password]|matches[password]',
    ];

    protected $validationMessages = [
        'nome'  => [
            'required'   => 'O campo nome é obrigatório.',
            'min_length' => 'O tamanho mínimo é de 4 caracteres.',
            'max_length' => 'O tamanho máximo é de 120 caracteres.',
        ],
        'email' => [
            'required'  => 'O campo e-mail é obrigatório.',
            'is_unique' => 'O e-mail informado já existe.',
        ],
        'cpf'   => [
            'required'  => 'O campo CPF é obrigatório.',
            'is_unique' => 'O CPF informado já existe.',
        ],
    ];

    // Eventos callback
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    public function procurar($term)
    {
        if (null == $term) {
            return [];
        }

        return $this->select('id, nome')
            ->like('nome', $term)
            ->get()
            ->getResult();
    }

    public function desabilitaValidacaoSenha()
    {
        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password']);
            unset($data['data']['password_confirmation']);
        }

        return $data;
    }

    public function desfazerExclusao(int $id)
    {
        return $this->protect(false)
            ->where('id', $id)
            ->set('deletado_em', null)
            ->update();
    }

    /**
     * @uses Class Autenticao
     * @param string $email 
     * @return array|object|null $usuario
     * @throws DataException 
     */
    public function buscaUsuarioPorEmail(string $email)
    {
        return $this->where('email', $email)->first();
    }
}
