<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, BaseResponse;

    protected function upload_file(
        \Illuminate\Http\UploadedFile $file,
        string $fileLabel,
        string $path  
    ): string {
        if ($file->isValid()) {
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storePubliclyAs('public/' . $path, $fileName);
    
            return $fileName;
        }
        return 'null';
    }
    
}
