<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function edit(User $user) {
        $user = User::find($user->id);
        $roles = ["super admin", "admin"];

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user) {
        $request->validate([
           'name' => 'required|string',
           'email' => 'required|string',
           'role' => 'required|string'
        ]);

        // avatar update handler
        if ($request->avatar != null) {
            $imagePath = public_path('images/avatar/'.$user->avatar);

            // delete the old one
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // save the new
            $imageFile = $request->file('avatar');
            $user->avatar = $imageFile->getClientOriginalName();
            $imageFile->move('images/avatar/', $imageFile->getClientOriginalName());
        }

        // update field
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        return redirect()->route('users.edit', $user->id)->with('success', 'Data updated successfully');
    }
}
