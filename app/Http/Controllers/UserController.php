<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);

        return view('users.view', compact('users'));
    }

    public function add()
    {
        $roles = ['super admin', 'admin'];

        return view('users.add', compact('roles'));
    }

    public function store(Request $request)
    {
        /**
         * $request->validate([
         * 'name' => ['required', 'string', 'max:255'],
         * 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
         * 'password' => ['required', 'confirmed', Rules\Password::defaults()],
         * ]);
         *
         * $user = User::create([
         * 'name' => $request->name,
         * 'email' => $request->email,
         * 'password' => Hash::make($request->password),
         * ]);
         *
         * event(new Registered($user));
         *
         * Auth::login($user);
         *
         * return redirect(RouteServiceProvider::HOME);
         */
        // validate
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|lowercase|unique:'.User::class,
            'password' => ['required', 'min:8', 'max:24', Password::defaults()],
        ]);

        // Simpan file image ke server
        $imageFile = $request->file('avatar');
        if ($request->avatar != null) {
            $fileName = $imageFile->getClientOriginalName();
            $imageFile->move('images/avatar', $fileName);
        } else {
            $fileName = null;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $fileName,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'admin',
        ]);

        return redirect()->route('users.view');
    }

    public function edit(User $user)
    {
        $user = User::find($user->id);
        $roles = ['super admin', 'admin'];

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'role' => 'required|string',
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

    public function delete(User $user)
    {
        // delete avatar
        $imagePath = public_path('images/avatar'.$user->avatar);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $user->delete();

        return redirect()->route('users.view');
    }
}
