<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class CollegeRegistrationModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'college';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'appnoyear',
        'appnosem',
        'appnoid',
        'appstatus',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'address',
        'birthdate',
        'civil_status',
        'gender',
        'contact_no',
        'ctc_no',
        'email',
        'availment',
        'school',
        'course',
        'appyear',
        'appsem',
        'appsy',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'manager',
        'profile_photo',
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    
    protected $db;
    
	public function __construct(ConnectionInterface &$db) {
		$this->db =& $db;
	}



    public function count(){  
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
        return $query;  
    }

}
