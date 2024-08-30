<?php

namespace App\Services;
use Illuminate\Http\Request;
use File;

class UploadService
{

    private $_UPLOAD_PATH = 'upload';

    public function uploadOneFile($paramFile, $paramPath ,$paramDelpath = NULL){
        try{
            $file = $request->file($paramFile);

            $file_name = rand().'.'.$file->extension();
                
            $upload_path = $this->_UPLOAD_PATH. '/'. $paramPath  . '/';
            
            $file->move($upload_path, $file_name);

            if( !empty( $paramDelpath ) ){
                File::delete($paramDelpath);
            }

            return true;
        }
        catch(Exception $e){
            return false;
        }
    }

    public function uploadManyFile($paramFile, $paramPath, $callback ,$paramDelpath = NULL){
        try{
            $files = $request->file($paramFile);

            foreach( $files as $key => $file ){

                $file_name = rand().'.'.$file->extension();
                    
                $upload_path = $this->_UPLOAD_PATH. '/'. $paramPath  . '/';
                
                $file->move($upload_path, $file_name);
    
                if( !empty( $paramDelpath ) ){
                    File::delete($paramDelpath);
                }

                $callback($upload_path . $file_name);
            }

            if( !empty( $uploadPath ) ){
                return $uploadPath;
            }
            
        }
        catch(Exception $e){
            return false;
        }
    }



}