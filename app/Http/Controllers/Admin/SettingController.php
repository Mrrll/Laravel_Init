<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting');
    }
    public function store(Type $var = null)
    {
        # code...
    }
    public function update(Type $var = null)
    {
        # code...
    }
}
