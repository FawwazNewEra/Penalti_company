<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin_ui.index');
    }

    public function product(){
        return view('admin_ui.crud.products.index');
    }

    public function user(){
        return view('admin_ui.crud.users.index');
    }

    public function setting(){
        return view('admin_ui.setting.index');
    }
}
