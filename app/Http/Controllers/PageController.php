<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index(){
        // fetching data from the api with 5 random breeds
        $breeds = Http::get('https://dog.ceo/api/breeds/list/random/5')['message'];
        return view('index',compact('breeds'));
    }
}
