<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Foto';
    protected $primaryKey       = 'IDfoto';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['IDfoto', 'Jenis_foto', 'Harga', 'Fotografer', 'password'];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}
