<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function output(Image $image)
    {
        return view('images/output')->with(['images' => $image->get()]);
        // return $image->get();
    }
}