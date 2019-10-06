<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use Illuminate\Http\Request;
use Image;
use App\Http\Controllers\Controller;

class AdminPagesController extends Controller
{  
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('backend.pages.index');
    }

}
