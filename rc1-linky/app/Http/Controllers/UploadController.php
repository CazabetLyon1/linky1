<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Parser\FilePaser;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('pages.importPage');
    }

    public function uploadSubmit(UploadRequest $request)
    {
        $filename = $request->file_upload->store('Data');
        
        //sale
        app('App\Parser\FilePaser')->loadFile($filename);
        return 'Upload successful!';
    }

}