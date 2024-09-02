<?php

namespace App\Services;
use Illuminate\Http\Request;
use File;

class UploadService
{
    private function upload($file, $param, $request){
        $file_name = rand().'.'.$file->extension();
            
        $file->move($param['uploadpath'], $file_name);

        if( !empty( $param['delpath'] ) ){
            File::delete($param['delpath']);
        }

        if( !empty( $param['callback'] ) ){
            $param['callback']($param['uploadpath'] . $file_name, $request);
        }
    }

    public function one($param, $request){
        $this->upload( $param['file'],  $param, $request);
    }

    public function many($param, $request){
        $files = $param['files'];
        foreach( $files as $key => $file ){
            $this->upload( $file,  $param, $request);
        }
    }



}