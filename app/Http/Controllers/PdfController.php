<?php

namespace App\Http\Controllers;

use File;
use Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as res;

class PdfController extends Controller
{
    //
    public function index()
    {

        return Respons::make(file_get_contents('images/image1.pdf'), 200, [
            'content-type' => 'application/pdf',
        ]);
        //or
        return response()->file(public_path('images/image1.pdf'), ['content-type' => 'application/pdf']);
    }
}
