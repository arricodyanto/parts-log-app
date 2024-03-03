<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        return view('users.view');
    }

    public function add()
    {
        return view('users.add');
    }

    public function store()
    {
        return null;
    }
}
