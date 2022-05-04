<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ImgController extends Controller
{
    public function search($fileName)
    {
        $path = public_path().'/img/profile/'.$fileName;
        return response()->file($path);
    }
}
