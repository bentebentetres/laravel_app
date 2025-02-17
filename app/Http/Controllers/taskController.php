<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class taskController extends Controller
{
    public function logout () {
        auth()->logout();
        return redirect('/');
    }


    public function CrudTask(Request $request) {
        $valid = $request->validate([
            'name' => ['required', Rule::unique('users', 'name')],
            'password' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
        ]);
        $valid['password'] = bcrypt($valid['password']);

        $user = User::create($valid);
        auth()->login($user);

        return redirect('/ ');
    }
}