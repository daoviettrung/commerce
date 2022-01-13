<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class ClientController extends Controller
{
    public function index(){
        $slides = Slide::all();
        return view('client.index', compact('slides'));
    }
}
