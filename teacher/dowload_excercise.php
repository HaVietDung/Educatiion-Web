<?php
    if(!empty($_GET['file'])){
        $imagename  = basename($_GET['file']);
        $filePath  = "../image/image_database/debai/".$imagename;// có phải sửa k
        
        if(!empty($imagename) && file_exists($filePath)){
            //define header
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$imagename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            
            //read file 
            readfile($filePath);
            exit;
        }
        else{
            echo "file not exit";
        }
    }
?>