<?php

namespace App\Models;

use CodeIgniter\Model;

class UserActivityModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user_activity';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields  = true;
    protected $allowedFields  = ['user_id', 'description', 'created_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    
    public function addLog($userId, $description)
    {
        $data = [
            'user_id' => $userId,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->insert($data);
    }

    public function getLogs($userId = null)
    {
        $builder = $this->db->table($this->table);
        if (!is_null($userId)) {
            $builder->where('user_id', $userId);
        }
        return $builder->orderBy('id', 'DESC')->get()->getResult();
    }

    public function deleteLogs($userId)
    {
        $this->where('user_id', $userId)->delete();
    }


}
