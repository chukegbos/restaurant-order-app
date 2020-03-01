<?php

namespace App\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class MenuController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function show(Menu $menu)
    {
        return $menu;
    }
}
