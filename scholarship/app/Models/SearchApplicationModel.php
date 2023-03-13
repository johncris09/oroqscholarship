<?php

namespace App\Models;

use CodeIgniter\Model;

class SearchApplicationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'senior_high';
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
        $builder = $this->db->table('senior_high');
        $builder->select('
            senior_high.id as id, 
            senior_high.lastname as lastname, 
            senior_high.firstname as firstname,
            senior_high.middlename as middlename,
            senior_high.suffix as suffix, 
            senior_high.availment as availment, 
            senior_high.appsy as sy, 
            senior_high.appyear as yearlevel, 
            senior_high.address as address, 
            senior_high.appsem as sem, 
            senior_high.appstatus as status, 
            senior_high.school as school, 
            "senior high" AS source 
        '); 
        $builder->like("senior_high.firstname ", $data, "both"); 
        $builder->orLike("senior_high.lastname ", $data, "both"); 
        $builder->orLike("senior_high.middlename", $data, "both"); 
        $builder->orLike("senior_high.suffix", $data, "both"); 
        $builder->orLike("senior_high.suffix", $data, "both"); 
        $builder->orLike("CONCAT(senior_high.firstname, ' ', senior_high.lastname)", $data, "both"); 
        $builder->orLike("CONCAT(senior_high.lastname, ' ', senior_high.firstname)", $data, "both"); 

        
        
        $builder->union(
            $this->db
                ->table('college')
                ->select('
                    college.id, 
                    college.lastname, 
                    college.firstname,
                    college.middlename,
                    college.suffix, 
                    college.availment,  
                    college.appsy,  
                    college.appyear,  
                    college.address, 
                    college.appsem, 
                    college.appstatus, 
                    college.school,
                    "college" AS source 
                ')
                ->like("college.firstname", $data, "both")
                ->orLike("college.lastname", $data, "both")
                ->orLike("college.middlename", $data, "both") 
                ->orLike("CONCAT(college.lastname, ' ', college.lastname)", $data, "both")
                ->orLike("CONCAT(college.lastname, ' ', college.lastname)", $data, "both")
        );
        
        $builder->union(
            $this->db
                ->table('tvet')
                ->select('
                    tvet.id, 
                    tvet.lastname, 
                    tvet.firstname,
                    tvet.middlename,
                    tvet.suffix, 
                    tvet.availment,  
                    tvet.appsy,  
                    tvet.appyear, 
                    tvet.address, 
                    tvet.appsem, 
                    tvet.appstatus, 
                    tvet.school,
                    "tvet" AS source 
                ')
                ->like("tvet.firstname", $data, "both")
                ->orLike("tvet.lastname", $data, "both")
                ->orLike("tvet.middlename", $data, "both")
                ->orLike("tvet.suffix", $data, "both") 
                ->orLike("CONCAT(tvet.lastname, ' ', tvet.lastname)", $data, "both")
                ->orLike("CONCAT(tvet.lastname, ' ', tvet.lastname)", $data, "both")
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
        $builder = $this->db->table('senior_high');
        $builder->select('
            senior_high.id as id, 
            senior_high.lastname as lastname, 
            senior_high.firstname as firstname,
            senior_high.middlename as middlename, 
            senior_high.suffix as suffix,  
            senior_high.appsy as sy, 
            senior_high.appyear as yearlevel, 
            senior_high.address as address, 
            senior_high.birthdate as birthdate,  
            senior_high.AppAge as age,  
            senior_high.civil_status as civil_status,
            senior_high.gender as gender, 
            senior_high.contact_no as contact_no, 
            senior_high.email as email_add, 
            senior_high.father_name as father_name, 
            senior_high.father_nameOccu as father_occupation, 
            senior_high.mother_name as mother_name, 
            senior_high.mother_nameOccu as mother_occupation, 
            senior_high.appsem as sem, 
            senior_high.school as school, 
            senior_high.schoolAddress as school_address, 
            senior_high.appstatus as status, 
            senior_high.ctc_no as ctc_no, 
            senior_high.availment as availment,   
            senior_high.course as course, 
            "senior high" AS source 
        '); 
        $builder->like("senior_high.firstname ", $data, "both"); 
        $builder->orLike("senior_high.lastname ", $data, "both"); 
        $builder->orLike("senior_high.middlename", $data, "both"); 
        $builder->orLike("senior_high.suffix", $data, "both");  
        $builder->orLike("CONCAT(senior_high.firstname, ' ', senior_high.lastname)", $data, "both"); 
        $builder->orLike("CONCAT(senior_high.lastname, ' ', senior_high.firstname)", $data, "both");
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
        $builder = $this->db->table('college');
        $builder->select('
            college.id as id, 
            college.lastname as lastname, 
            college.lastname as firstname,
            college.middlename as middlename, 
            college.suffix as suffix,  
            college.appsy as sy, 
            college.appyear as yearlevel, 
            college.address as address, 
            college.colDOB as birthdate,  
            college.colAge as age,  
            college.civil_status as civil_status,
            college.gender as gender, 
            college.gender as contact_no, 
            college.email as email_add, 
            college.father_name as father_name, 
            college.father_occupation as father_occupation, 
            college.mother_name as mother_name, 
            college.mother_occupation as mother_occupation, 
            college.appsem as sem, 
            college.school as school, 
            college.schoolAddress as school_address, 
            college.appstatus as status, 
            college.ctc_no as ctc_no, 
            college.availment as availment,   
            college.course as course, 
            "senior high" AS source 
        '); 
        $builder->like("college.firstname ", $data, "both"); 
        $builder->orLike("college.firstname ", $data, "both"); 
        $builder->orLike("college.middlename", $data, "both"); 
        $builder->orLike("college.suffix", $data, "both");  
        $builder->orLike("CONCAT(college.firstname, ' ', college.firstname)", $data, "both"); 
        $builder->orLike("CONCAT(college.firstname, ' ', college.firstname)", $data, "both");
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
        $builder = $this->db->table('tvet');
        $builder->select('
            tvet.id as id, 
            tvet.lastname as lastname, 
            tvet.lastname as firstname,
            tvet.middlename as middlename, 
            tvet.suffix as suffix,  
            tvet.appsy as sy, 
            tvet.appyear as yearlevel, 
            tvet.address as address, 
            tvet.colDOB as birthdate,  
            tvet.colAge as age,  
            tvet.civil_status as civil_status,
            tvet.gender as gender, 
            tvet.gender as contact_no, 
            tvet.email as email_add, 
            tvet.father_name as father_name, 
            tvet.father_occupation as father_occupation, 
            tvet.mother_name as mother_name, 
            tvet.mother_occupation as mother_occupation, 
            tvet.appsem as sem, 
            tvet.school as school, 
            tvet.schoolAddress as school_address, 
            tvet.appstatus as status, 
            tvet.ctc_no as ctc_no, 
            tvet.availment as availment,   
            tvet.course as course, 
            "senior high" AS source 
        '); 
        $builder->like("tvet.firstname ", $data, "both"); 
        $builder->orLike("tvet.firstname ", $data, "both"); 
        $builder->orLike("tvet.middlename", $data, "both"); 
        $builder->orLike("tvet.suffix", $data, "both");  
        $builder->orLike("CONCAT(tvet.firstname, ' ', tvet.firstname)", $data, "both"); 
        $builder->orLike("CONCAT(tvet.firstname, ' ', tvet.firstname)", $data, "both");
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
