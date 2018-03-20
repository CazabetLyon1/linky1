<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('pages.importPage');
    }

    public function uploadSubmit(UploadRequest $request)
    {
        $filename = $request->file_upload->store('temp');
        $path_init = storage_path('app/');
        $path = storage_path('app/temp/');
        $user_id = Auth::id();
        rename($path_init.$filename,$path.$user_id.".txt");
        //TODO return a view
        var_dump(opendir(storage_path('app/temp/')));

        return 'Upload successful!';
    }

}