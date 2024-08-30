<?php

namespace App\Services;
use Illuminate\Http\Request;
use File;

class UploadService
{

    private $_UPLOAD_PATH = 'upload';

    public function uploadOneFile($param){
        try{
            $file = $request->file($param['filename']);

            $file_name = rand().'.'.$file->extension();
                
            $upload_path = $this->_UPLOAD_PATH. '/'. $param['uploadpath']  . '/';
            
            $file->move($upload_path, $file_name);

            if( !empty( $param['delpath'] ) ){
                File::delete($param['delpath']);
            }

            return true;
        }
        catch(Exception $e){
            return false;
        }
    }

    public function uploadManyFile($param){
        try{
            $files = $request->file($param['filename']);

            foreach( $files as $key => $file ){

                $file_name = rand().'.'.$file->extension();
                    
                $upload_path = $this->_UPLOAD_PATH. '/'. $param['uploadpath']  . '/';
                
                $file->move($upload_path, $file_name);
    
                if( !empty( $param['delpath'] ) ){
                    File::delete($param['delpath']);
                }

                if( !empty( $param['callback'] ) ){
                    $param['callback']($upload_path . $file_name);
                }
                
            }

            return true;
            
        }
        catch(Exception $e){
            return false;
        }
    }



}