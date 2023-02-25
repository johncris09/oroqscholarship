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
            table_scholarregistration.id as id, 
            table_scholarregistration.AppLastName as lastname, 
            table_scholarregistration.AppFirstName as firstname,
            table_scholarregistration.AppMidIn as middlename,
            table_scholarregistration.AppSuffix as suffix, 
            table_scholarregistration.AppAvailment as availment, 
            table_scholarregistration.AppSY as sy, 
            table_scholarregistration.AppYear as yearlevel, 
            table_scholarregistration.AppAddress as address, 
            table_scholarregistration.AppSem as sem, 
            table_scholarregistration.AppStatus as status, 
            "senior high" AS source 
        '); 
        $builder->like("table_scholarregistration.AppFirstName ", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppLastName ", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppMidIn", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppSuffix", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppSuffix", $data, "both"); 
        $builder->orLike("CONCAT(table_scholarregistration.AppFirstName, ' ', table_scholarregistration.AppLastName)", $data, "both"); 
        $builder->orLike("CONCAT(table_scholarregistration.AppLastName, ' ', table_scholarregistration.AppFirstName)", $data, "both"); 

        
        
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
                    table_collegeapp.colAppStat, 
                    "college" AS source 
                ')
                ->like("table_collegeapp.colFirstName", $data, "both")
                ->orLike("table_collegeapp.colLastName", $data, "both")
                ->orLike("table_collegeapp.colMI", $data, "both") 
                ->orLike("CONCAT(table_collegeapp.colLastName, ' ', table_collegeapp.colLastName)", $data, "both")
                ->orLike("CONCAT(table_collegeapp.colLastName, ' ', table_collegeapp.colLastName)", $data, "both")
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
                    table_tvet.colAppStat, 
                    "tvet" AS source 
                ')
                ->like("table_tvet.colFirstName", $data, "both")
                ->orLike("table_tvet.colLastName", $data, "both")
                ->orLike("table_tvet.colMI", $data, "both")
                ->orLike("table_tvet.colSuffix", $data, "both") 
                ->orLike("CONCAT(table_tvet.colLastName, ' ', table_tvet.colLastName)", $data, "both")
                ->orLike("CONCAT(table_tvet.colLastName, ' ', table_tvet.colLastName)", $data, "both")
        );
 
        // Get the result
        $query = $builder->get();
        // $query = $builder->getCompiledSelect();

        // Return the result
        return $query->getResult();
        // return $query; 
    }

    
    public function shs_autofill($data)
    {
        $builder = $this->db->table('table_scholarregistration');
        $builder->select('
            table_scholarregistration.id as id, 
            table_scholarregistration.AppLastName as lastname, 
            table_scholarregistration.AppFirstName as firstname,
            table_scholarregistration.AppMidIn as middlename, 
            table_scholarregistration.AppSuffix as suffix,  
            table_scholarregistration.AppSY as sy, 
            table_scholarregistration.AppYear as yearlevel, 
            table_scholarregistration.AppAddress as address, 
            table_scholarregistration.AppDOB as birthdate,  
            table_scholarregistration.AppAge as age,  
            table_scholarregistration.AppCivilStat as civil_status,
            table_scholarregistration.AppGender as gender, 
            table_scholarregistration.AppContact as contact_no, 
            table_scholarregistration.AppEmailAdd as email_add, 
            table_scholarregistration.AppFather as father_name, 
            table_scholarregistration.AppFatherOccu as father_occupation, 
            table_scholarregistration.AppMother as mother_name, 
            table_scholarregistration.AppMotherOccu as mother_occupation, 
            table_scholarregistration.AppSem as sem, 
            table_scholarregistration.AppSchool as school, 
            table_scholarregistration.AppSchoolAddress as school_address, 
            table_scholarregistration.AppStatus as status, 
            table_scholarregistration.AppCTC as ctc_no, 
            table_scholarregistration.AppAvailment as availment,   
            table_scholarregistration.AppCourse as course, 
            "senior high" AS source 
        '); 
        $builder->like("table_scholarregistration.AppFirstName ", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppLastName ", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppMidIn", $data, "both"); 
        $builder->orLike("table_scholarregistration.AppSuffix", $data, "both");  
        $builder->orLike("CONCAT(table_scholarregistration.AppFirstName, ' ', table_scholarregistration.AppLastName)", $data, "both"); 
        $builder->orLike("CONCAT(table_scholarregistration.AppLastName, ' ', table_scholarregistration.AppFirstName)", $data, "both");
        $builder->orderBy("id", "DESC"); 
 
        // Get the result
        $query = $builder->get();
        // $query = $builder->getCompiledSelect();

        // Return the result
        if(count($query->getResult()) > 0){ 
            return $query->getResult()[0]; 
        }else{
            return [
                "lastname"          => "",
                "firstname"         => "",
                "middlename"        => "",
                "suffix"            => "",
                "address"           => "",
                "sy"                => "",
                "yearlevel"         => "",
                "availment"         => "",
                "address"           => "",
                "birthdate"         => "",
                "age"               => "",
                "civil_status"      => "",
                "gender"            => "",
                "contact_no"        => "",
                "email_add"         => "",
                "father_name"       => "",
                "father_occupation" => "",
                "mother_name"       => "",
                "mother_occupation" => "",
                "sem"               => "",
                "school"            => "",
                "school_address"    => "",
                "status"            => "",
                "ctc_no"            => "",  
                "course"            => "",  
                "yearlevel"         => "",   
            ];
        } 
    }
 

    public function college_autofill($data)
    {
        $builder = $this->db->table('table_collegeapp');
        $builder->select('
            table_collegeapp.id as id, 
            table_collegeapp.colLastName as lastname, 
            table_collegeapp.colLastName as firstname,
            table_collegeapp.colMI as middlename, 
            table_collegeapp.colSuffix as suffix,  
            table_collegeapp.colSY as sy, 
            table_collegeapp.colYearLevel as yearlevel, 
            table_collegeapp.colAddress as address, 
            table_collegeapp.colDOB as birthdate,  
            table_collegeapp.colAge as age,  
            table_collegeapp.colCivilStat as civil_status,
            table_collegeapp.colGender as gender, 
            table_collegeapp.colGender as contact_no, 
            table_collegeapp.colEmailAdd as email_add, 
            table_collegeapp.colFathersName as father_name, 
            table_collegeapp.colFatherOccu as father_occupation, 
            table_collegeapp.colMothersName as mother_name, 
            table_collegeapp.colMotherOccu as mother_occupation, 
            table_collegeapp.colSem as sem, 
            table_collegeapp.colSchool as school, 
            table_collegeapp.colSchoolAddress as school_address, 
            table_collegeapp.colAppStat as status, 
            table_collegeapp.colCTC as ctc_no, 
            table_collegeapp.colAvailment as availment,   
            table_collegeapp.colCourse as course, 
            "senior high" AS source 
        '); 
        $builder->like("table_collegeapp.colFirstName ", $data, "both"); 
        $builder->orLike("table_collegeapp.colFirstName ", $data, "both"); 
        $builder->orLike("table_collegeapp.colMI", $data, "both"); 
        $builder->orLike("table_collegeapp.colSuffix", $data, "both");  
        $builder->orLike("CONCAT(table_collegeapp.colFirstName, ' ', table_collegeapp.colFirstName)", $data, "both"); 
        $builder->orLike("CONCAT(table_collegeapp.colFirstName, ' ', table_collegeapp.colFirstName)", $data, "both");
        $builder->orderBy("id", "DESC"); 
 
        // Get the result
        $query = $builder->get();
        // $query = $builder->getCompiledSelect();

        // Return the result
        if(count($query->getResult()) > 0){ 
            return $query->getResult()[0]; 
        }else{
            return [
                "lastname"          => "",
                "firstname"         => "",
                "middlename"        => "",
                "suffix"            => "",
                "address"           => "",
                "sy"                => "",
                "yearlevel"         => "",
                "availment"         => "",
                "address"           => "",
                "birthdate"         => "",
                "age"               => "",
                "civil_status"      => "",
                "gender"            => "",
                "contact_no"        => "",
                "email_add"         => "",
                "father_name"       => "",
                "father_occupation" => "",
                "mother_name"       => "",
                "mother_occupation" => "",
                "sem"               => "",
                "school"            => "",
                "school_address"    => "",
                "status"            => "",
                "ctc_no"            => "",  
                "course"            => "",  
                "yearlevel"         => "",   
            ];
        } 
    }


    public function tvet_autofill($data)
    {
        $builder = $this->db->table('table_tvet');
        $builder->select('
            table_tvet.id as id, 
            table_tvet.colLastName as lastname, 
            table_tvet.colLastName as firstname,
            table_tvet.colMI as middlename, 
            table_tvet.colSuffix as suffix,  
            table_tvet.colSY as sy, 
            table_tvet.colYearLevel as yearlevel, 
            table_tvet.colAddress as address, 
            table_tvet.colDOB as birthdate,  
            table_tvet.colAge as age,  
            table_tvet.colCivilStat as civil_status,
            table_tvet.colGender as gender, 
            table_tvet.colGender as contact_no, 
            table_tvet.colEmailAdd as email_add, 
            table_tvet.colFathersName as father_name, 
            table_tvet.colFatherOccu as father_occupation, 
            table_tvet.colMothersName as mother_name, 
            table_tvet.colMotherOccu as mother_occupation, 
            table_tvet.colSem as sem, 
            table_tvet.colSchool as school, 
            table_tvet.colSchoolAddress as school_address, 
            table_tvet.colAppStat as status, 
            table_tvet.colCTC as ctc_no, 
            table_tvet.colAvailment as availment,   
            table_tvet.colCourse as course, 
            "senior high" AS source 
        '); 
        $builder->like("table_tvet.colFirstName ", $data, "both"); 
        $builder->orLike("table_tvet.colFirstName ", $data, "both"); 
        $builder->orLike("table_tvet.colMI", $data, "both"); 
        $builder->orLike("table_tvet.colSuffix", $data, "both");  
        $builder->orLike("CONCAT(table_tvet.colFirstName, ' ', table_tvet.colFirstName)", $data, "both"); 
        $builder->orLike("CONCAT(table_tvet.colFirstName, ' ', table_tvet.colFirstName)", $data, "both");
        $builder->orderBy("id", "DESC"); 
 
        // Get the result
        $query = $builder->get();
        // $query = $builder->getCompiledSelect();

        // Return the result
        if(count($query->getResult()) > 0){ 
            return $query->getResult()[0]; 
        }else{
            return [
                "lastname"          => "",
                "firstname"         => "",
                "middlename"        => "",
                "suffix"            => "",
                "address"           => "",
                "sy"                => "",
                "yearlevel"         => "",
                "availment"         => "",
                "address"           => "",
                "birthdate"         => "",
                "age"               => "",
                "civil_status"      => "",
                "gender"            => "",
                "contact_no"        => "",
                "email_add"         => "",
                "father_name"       => "",
                "father_occupation" => "",
                "mother_name"       => "",
                "mother_occupation" => "",
                "sem"               => "",
                "school"            => "",
                "school_address"    => "",
                "status"            => "",
                "ctc_no"            => "",  
                "course"            => "",  
                "yearlevel"         => "",   
            ];
        } 
    }

}
