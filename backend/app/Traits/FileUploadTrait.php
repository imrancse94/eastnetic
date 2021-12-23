<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait{

    public function uploadFile($folder_name,$base64_string,$old_file = ""){
        try{
             
            @list($extension, $file_data) = explode(';', $base64_string);
            @list(, $file_data) = explode(',', $file_data); 
            $extension = explode(";", explode("/", $base64_string)[1])[0];
            $file_name = $folder_name."/".time().'.'.$extension;

            if(!empty($old_file)){
                $this->fileDeleteByPath($old_file);
            }

            $file_path = "uploads/".$file_name;
            return Storage::put("public/".$file_path,base64_decode($file_data)) ? $file_path : null;
        }catch(\Exception $ex){
          // dd($ex->getMessage());
        }

        return null;
    }

    public function fileDeleteByPath($file_path){
        $result = false;
        $file_path = public_path()."/storage/".$file_path;
        if(File::exists($file_path)){
            $result = File::delete($file_path);
        }

        return $result;
    }

    public function getImageByFilePath($file_path,$is_base64 = false){

        if($is_base64){
            return base64_encode(file_get_contents("storage/".$file_path));
        }
        if (Storage::disk('public')->exists($file_path)) {
            return asset("storage/".$file_path);
        }
        
        return null;
    }

    
}