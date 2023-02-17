<?php

namespace App\Models;

use CodeIgniter\Model;

class SearchApplicationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'table_scholarregistration';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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

    public function search($data)
    {
        $builder = $this->db->table('table_scholarregistration');
        $builder->select('
            table_scholarregistration.id, 
            table_scholarregistration.AppLastName, 
            table_scholarregistration.AppFirstName,
            table_scholarregistration.AppMidIn,
            table_scholarregistration.AppSuffix, 
            table_scholarregistration.AppAvailment, 
            table_scholarregistration.AppSY, 
            table_scholarregistration.AppYear, 
            table_scholarregistration.AppAddress, 
            table_scholarregistration.AppSem, 
            "senior high" AS source 
        '); 
        $builder->like("table_scholarregistration.AppFirstName ", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppLastName ", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppMidIn ", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppSuffix ", $data, "both"); 
        
        $builder->union(
            $this->db
                ->table('table_collegeapp')
                ->select('
                    table_collegeapp.id, 
                    table_collegeapp.colLastName, 
                    table_collegeapp.colFirstName,
                    table_collegeapp.colMI,
                    table_collegeapp.colSuffix, 
                    table_collegeapp.colAvailment,  
                    table_collegeapp.colSY,  
                    table_collegeapp.colYearLevel,  
                    table_collegeapp.colAddress, 
                    table_collegeapp.colSem, 
                    "college" AS source 
                ')
                ->like("table_collegeapp.colFirstName", $data, "both")
                ->orLike("table_collegeapp.colLastName", $data, "both")
                ->orLike("table_collegeapp.colMI", $data, "both") 
        );
        
        $builder->union(
            $this->db
                ->table('table_tvet')
                ->select('
                    table_tvet.id, 
                    table_tvet.colLastName, 
                    table_tvet.colFirstName,
                    table_tvet.colMI,
                    table_tvet.colSuffix, 
                    table_tvet.colAvailment,  
                    table_tvet.colSY,  
                    table_tvet.colYearLevel, 
                    table_tvet.colAddress, 
                    table_tvet.colSem, 
                    "tvet" AS source 
                ')
                ->like("table_tvet.colFirstName", $data, "both")
                ->orLike("table_tvet.colLastName", $data, "both")
                ->orLike("table_tvet.colMI", $data, "both")
                ->orLike("table_tvet.colSuffix", $data, "both") 
        );
 
        // Get the result
        $query = $builder->get();
        // $query = $builder->getCompiledSelect();

        // Return the result
        return $query->getResult();
        // return $query; 
    }
}
