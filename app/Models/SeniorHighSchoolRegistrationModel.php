<?php

namespace App\Models;

use CodeIgniter\Model;

class SeniorHighSchoolRegistrationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'table_scholarregistration';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "AppNoYear",
        "AppNoID",
        "AppNoSem",
        "AppStatus",
        "AppFirstName",
        "AppMidIn",
        "AppLastName",
        "AppSuffix",
        "AppAddress",
        "AppDOB",
        "AppAge",
        "AppCivilStat",
        "AppGender",
        "AppContact",
        "AppCTC",
        "AppEmailAdd",
        "AppAvailment",
        "AppSchool",
        "AppCourse",
        "AppYear",
        "AppSem",
        "AppSy",
        "AppFather",
        "AppFatherOccu",
        "AppMother",
        "AppMotherOccu",
        "AppManager"
    ];

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
}
