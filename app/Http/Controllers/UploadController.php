<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function  upload(Request $request) 
    {
        $file = $request->file('file');

       

        $request->file('foo')->move(public_path);
        return $request->all();
    }
}
