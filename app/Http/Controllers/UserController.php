<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('users.view', compact('users'));
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
