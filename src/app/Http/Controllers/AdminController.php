<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $shops = Shop::all();
        return view("admin.admin", compact("shops"));
    }
}
