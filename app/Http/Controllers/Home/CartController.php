<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Home\BaseController;

class CartController extends BaseController
{
    public function index()
    {
        return view('home/cart/index');
    }
}
