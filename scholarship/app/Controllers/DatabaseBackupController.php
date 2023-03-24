<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PHPUnit\Util\Filesystem;

class DatabaseBackupController extends BaseController
{ 
    public function index()
    { 
        $data["page_title"] = "Back Up Databae";  
        return view('admin/backup', $data);
    }

    public function backup(){
        helper('filesystem');
        $db = \Config\Database::connect();
        $dbname = $db->database;
        $path = FCPATH.'scholarship/db/';    
        $filename = $dbname.'_'.date('dMY_His').'.sql';    
        $prefs = ['filename' => $filename]; 
    
        $util = (new \CodeIgniter\Database\Database())->loadUtils($db); 
        $backup = $util->backup($prefs,$db);
            
        $save = write_file($path.$filename.'.gz', $backup);  

        if ($save){ 
            $res = [
                "response" => true,
                "message"  => "Successfully Back up", 
            ]; 
        }else{
            $res = [
                "response" => true,
                "message"  => "Unable to back up", 
            ]; 
        }
        echo Json_encode($res);
    }

    public function get_all_files()
    { 
        
        $data = [];
        helper('filesystem');
        $files = directory_map(FCPATH.'scholarship/db/', false, true); 
        $file_tye ="";
        foreach($files as $row){
            $file_info = get_file_info(FCPATH.'scholarship/db/'. $row); 
            $file = new \CodeIgniter\Files\File(FCPATH.'scholarship/db/'. $row); 
            if($file->getMimeType() == "application/gzip"){
                $file_type = "zip";
            }else{ 
                $file_type = "text";
            }
            $data['data'][] = array(
                'name' => $file_info['name'],
                'size' => $file->getSizeByUnit('mb') . " MB",
                'date' => date('m/d/Y H:i:s', $file_info['date']),  
                'file_type' => $file_type,  
            );
        }  
        echo Json_encode($data); 
    }

    public function download($filename)
    {
        $path = FCPATH.'scholarship/db/';
        return $this->response->download($path.$filename,null);
    }


}
